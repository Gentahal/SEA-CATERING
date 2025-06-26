<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;


class DashboardController extends Controller
{
    public function userDashboard()
    {
        $subscriptions = Subscription::where('user_id', auth()->id())
            ->whereIn('status', ['active', 'paused'])
            ->latest()
            ->get();

        return view('dashboard.user', compact('subscriptions'));
    }

    public function pauseSubscription(Request $request, Subscription $subscription)
    {
        if ($subscription->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'pause_start' => 'required|date|after_or_equal:today',
            'pause_end' => 'required|date|after:pause_start',
        ]);

        $subscription->update([
            'status' => 'paused',
            'pause_start' => $request->pause_start,
            'pause_end' => $request->pause_end,
        ]);

        return back()->with('success', 'Berhasil menjeda langganan.');
    }

    public function cancelSubscription(Subscription $subscription)
    {
        if ($subscription->user_id !== auth()->id()) {
            abort(403);
        }

        $subscription->update([
            'status' => 'cancelled',
            'pause_start' => null,
            'pause_end' => null,
        ]);

        return back()->with('success', 'Langganan berhasil dibatalkan.');
    }

    public function resumeSubscription(Subscription $subscription)
    {
        if ($subscription->user_id !== auth()->id()) {
            abort(403);
        }

        $subscription->update([
            'status' => 'active',
            'pause_start' => null,
            'pause_end' => null,
        ]);

        return back()->with('success', 'Langganan berhasil diaktifkan kembali.');
    }

    public function adminDashboard(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

        $start = $validated['start_date'] ?? now()->subMonth()->startOfDay()->toDateString();
        $end = $validated['end_date'] ?? now()->endOfDay()->toDateString();

        $subscriptionsQuery = Subscription::query();

        $metrics = [
            'totalNew' => $subscriptionsQuery->count(),
            'totalMRR' => $subscriptionsQuery->clone()->where('status', 'active')->sum('total_price'),
            'reactivations' => Subscription::where('status', 'active')
                ->whereBetween('updated_at', [$start, $end])
                ->whereNotNull('pause_end')
                ->count(),
            'totalActive' => Subscription::where('status', 'active')->count(),

            'previousPeriodNew' => Subscription::whereBetween(
                'created_at',
                [now()->parse($start)->subMonth()->toDateString(), now()->parse($start)->subDay()->toDateString()]
            )->count(),
            'growthPercentage' => 0 
        ];

        if ($metrics['previousPeriodNew'] > 0) {
            $metrics['growthPercentage'] = (($metrics['totalNew'] - $metrics['previousPeriodNew']) / $metrics['previousPeriodNew']) * 100;
        }

        $chartData = $this->getSubscriptionChartData($start, $end);

        return view('dashboard.admin', array_merge([
            'start' => $start,
            'end' => $end,
        ], $metrics, $chartData));
    }

    protected function getSubscriptionChartData($start, $end)
    {
        $days = now()->parse($start)->diffInDays(now()->parse($end)) + 1;

        if ($days <= 31) {
            $format = 'Y-m-d';
            $groupBy = 'DATE(created_at)';
        } elseif ($days <= 365) {
            $format = 'Y-W';
            $groupBy = 'YEARWEEK(created_at)';
        } else {
            $format = 'Y-m';
            $groupBy = 'DATE_FORMAT(created_at, "%Y-%m")';
        }

        $subscriptions = Subscription::selectRaw("
            {$groupBy} as period,
            COUNT(*) as count,
            SUM(CASE WHEN status = 'active' THEN total_price ELSE 0 END) as revenue
        ")
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        return [
            'chartLabels' => $subscriptions->map(fn($item) => $item->period),
            'subscriptionCounts' => $subscriptions->pluck('count'),
            'revenueData' => $subscriptions->pluck('revenue'),
            'chartType' => $days <= 31 ? 'day' : ($days <= 365 ? 'week' : 'month')
        ];
    }
}
