@extends('layouts.app')

@section('title', 'Menu Meal Plans - SEA Catering')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Our <span style="color: #2a9d8f">Meal Plans</span></h1>
                <p class="lead text-muted">Choose the perfect plan for your dietary needs and lifestyle</p>
            </div>

            <div class="row g-4">
                @foreach ([
            [
                'name' => 'Diet Plan',
                'price' => 'Rp30.000',
                'desc' => 'Perfect for weight management with balanced nutrition',
                'features' => ['1200-1500 calories per meal', 'Low-carb options', 'High fiber', 'Vegetarian available'],
                'icon' => 'fas fa-weight-scale',
            ],
            [
                'name' => 'Protein Plan',
                'price' => 'Rp40.000',
                'desc' => 'High protein meals for muscle growth and recovery',
                'features' => ['30-40g protein per meal', 'Lean meat options', 'Post-workout recovery', 'Supplement friendly'],
                'icon' => 'fas fa-dumbbell',
            ],
            [
                'name' => 'Royal Plan',
                'price' => 'Rp60.000',
                'desc' => 'Premium gourmet meals with complete nutrition',
                'features' => ['Chef-curated menus', 'Organic ingredients', 'International cuisine', 'Customizable'],
                'icon' => 'fas fa-crown',
            ],
        ] as $index => $plan)
                    <div class="col-lg-4 col-md-6">
                        <div class="card plan-card h-100 border-0 shadow-sm overflow-hidden">
                            <div style="background-color: #2a9d8f" class="card-header text-white py-3">
                                <div class="d-flex align-items-center">
                                    <i class="{{ $plan['icon'] }} fa-2x me-3"></i>
                                    <h3 class="mb-0">{{ $plan['name'] }}</h3>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <span class="display-5 fw-bold" style="color: #2a9d8f">{{ $plan['price'] }}</span>
                                    <span class="text-muted">/meal</span>
                                </div>

                                <p class="text-center mb-4">{{ $plan['desc'] }}</p>

                                <ul class="list-unstyled mb-4">
                                    @foreach ($plan['features'] as $feature)
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #2a9d8f"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0 pb-4 px-4">
                                <button style="color: #2a9d8f; border-color: #2a9d8f" class="btn w-100 py-2"
                                    onmouseover="this.style.backgroundColor='#2a9d8f'; this.style.color='white'"
                                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#2a9d8f'"
                                    data-bs-toggle="modal" data-bs-target="#modal{{ $index }}">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $index }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <div>
                                        <h3 class="modal-title fw-bold">{{ $plan['name'] }}</h3>
                                        <p class="text-muted mb-0">{{ $plan['desc'] }}</p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary fs-6 px-3 py-2 me-3">
                                            <i class="{{ $plan['icon'] }} me-2"></i>
                                            {{ $plan['price'] }}/meal
                                        </span>
                                        <span class="text-muted">Minimum order: 5 meals</span>
                                    </div>

                                    <h5 class="mb-3">Plan Features:</h5>
                                    <ul class="list-unstyled mb-4">
                                        @foreach ($plan['features'] as $feature)
                                            <li class="mb-2">
                                                <i style="color: #2a9d8f" class="fas fa-check-circle  me-2"></i>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="alert alert-light">
                                        <h6><i style="color: #2a9d8f" class="fas fa-info-circle me-2"></i>Additional
                                            Information</h6>
                                        <p class="mb-0">All plans available for Breakfast, Lunch, and Dinner.
                                            Customization options available upon request.</p>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="/subscriptions" class="btn btn-primary">Subscribe Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="card border-0 bg-light p-4">
                        <h4 class="mb-3">Not sure which plan is right for you?</h4>
                        <p class="mb-4">Our nutrition specialists can help you choose the perfect meal plan based on your
                            dietary needs and health goals.</p>
                        <a href="/contact" class="btn btn-primary px-4">Consult Our Nutritionist</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .plan-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }

        .modal-content {
            border-radius: 12px;
        }
    </style>
@endsection
