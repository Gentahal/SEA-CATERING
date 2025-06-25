<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'plan' => 'required|in:diet,protein,royal',
        'meal_types' => 'required|array|min:1',
        'delivery_days' => 'required|array|min:1',
        ]);

        $prices = ['diet' => 30000, 'protein' => 40000, 'royal' => 60000];
        $planPrice = $prices[$request->plan];
        $mealCount = count($request->meal_types);
        $dayCount = count($request->delivery_days);
        $total = $planPrice * $mealCount * $dayCount * 4.3;

        Subscription::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'plan' => $request->plan,
            'meal_types' => json_encode($request->meal_types),
            'delivery_days' => json_encode($request->delivery_days),
            'allergies' => $request->allergies,
            'total_price' => $total,
        ]);

        return redirect('user/dashboard')->with('success', 'Subscription berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
