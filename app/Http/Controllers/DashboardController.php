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

        $start = $request->input('start_date') ?? now()->subMonth()->toDateString();
        $end = $request->input('end_date') ?? now()->toDateString();

        $subs = Subscription::whereBetween('created_at', [$start, $end]);

        $totalNew = $subs->count();
        $totalMRR = $subs->where('status', 'active')->sum('total_price');
        $reactivations = Subscription::where('status', 'active')
            ->whereBetween('updated_at', [$start, $end])
            ->whereNotNull('pause_end')->count();
        $totalActive = Subscription::where('status', 'active')->count();

        return view('dashboard.admin', compact('totalNew', 'totalMRR', 'reactivations', 'totalActive', 'start', 'end'));
    }
}
