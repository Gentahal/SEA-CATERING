<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();

        return view('contact.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::debug('Testimonial submission received', $request->all());

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'message' => 'required|string|min:3|max:1000',
                'rating' => 'required|integer|between:1,5'
            ]);

            Log::debug('Validation passed', $validated);

            $testimonial = Testimonial::create([
                'name' => $validated['name'],
                'message' => $validated['message'],
                'rating' => $validated['rating'],
            ]);

            return back()->with('success', 'Thank you for your testimonial! It will be visible after approval.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error submitting testimonial: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
