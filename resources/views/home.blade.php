@extends('layouts.app')

@section('title', 'Home - SEA Catering')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="container py-5 bg-white">
            <div class="row align-items-center py-5">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4">Healthy Meals, <span style="color: #2a9d8f">Anytime</span>, Anywhere</h1>
                    <p class="lead mb-5">SEA Catering serves high-quality healthy food that can be customized and delivered throughout Indonesia.</p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                        <a href="/menu" class="btn btn-primary btn-lg px-4 py-3">Explore Our Menu</a>
                        <a href="/subscriptions" class="btn btn-outline-secondary btn-lg px-4 py-3">Subscription Plans</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                         alt="Healthy food" 
                         class="img-fluid rounded-3 shadow-lg" 
                         style="transform: rotate(3deg);">
                </div>
            </div>
        </div>
        
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Choose <span style="color: #2a9d8f">SEA Catering</span>?</h2>
                <p class="lead text-muted">We provide a different healthy eating experience</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon bg-primary bg-opacity-10  rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-utensils fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Menu Customization</h5>
                            <p class="card-text text-muted">Choose a healthy menu according to your dietary preferences and tastes with a variety of delicious choices.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon bg-primary bg-opacity-10  rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-truck fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">National Shipping</h5>
                            <p class="card-text text-muted">Deliver fresh food to all major cities in Indonesia with special packaging.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon bg-primary bg-opacity-10  rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-chart-pie fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Complete Nutritional Information</h5>
                            <p class="card-text text-muted">Complete nutritional details on each menu to support your healthy lifestyle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What Our <span style="color: #2a9d8f">Customers Say</span></h2>
                <p class="lead text-muted">Testimonials from our loyal customers</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                            <div>
                                <h5 class="mb-0 fw-bold">Sarah Wijaya</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">"Makanannya selalu fresh dan enak! Sudah langganan 6 bulan dan berat badan turun 5kg tanpa harus diet ketat."</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                            <div>
                                <h5 class="mb-0 fw-bold">Budi Santoso</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">"Pengiriman tepat waktu dan packaging sangat rapi. Menu untuk diabetesnya membantu menjaga gula darah saya stabil."</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                            <div>
                                <h5 class="mb-0 fw-bold">Dewi Lestari</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">"Anak-anak yang biasanya picky eater jadi doyan makan sayur sejak berlangganan SEA Catering. Terima kasih!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 text-white" style="background-color: #2a9d8f;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Ready to Start Your Healthy Journey?</h2>
                    <p class="lead mb-5">Sign up now and get 15% off your first order!</p>
                    <a href="/subscriptions" class="btn btn-light btn-lg px-5 py-3 fw-bold">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hero-section {
            background-color: #f8f9fa;
            position: relative;
        }
        
        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }
        
        .feature-icon {
            transition: all 0.3s ease;
        }
        
        .card:hover .feature-icon {
            background-color: var(--primary-color) !important;
            color: white !important;
            transform: scale(1.1);
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px !important;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection