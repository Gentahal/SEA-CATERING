@extends('layouts.app')

@section('title', 'Contact & Testimonials - SEA Catering')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Contact <span style="color: #2a9d8f">&</span> Testimonials</h1>
                <p class="lead text-muted">We'd love to hear from you. Share your experience with us!</p>
            </div>

            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-4"><i style="color: #2a9d8f" class="fas fa-headset me-2"></i> Contact Us
                            </h3>

                            <div class="d-flex align-items-start mb-4">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i style="color: #2a9d8f" class="fas fa-user-tie "></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Customer Service Manager</h5>
                                    <p class="mb-1">Brian Wijaya</p>
                                    <a style="color: #2a9d8f" href="https://wa.me/628123456789"
                                        class="text-decoration-none">
                                        <i class="fab fa-whatsapp text-success me-2"></i> 0812-3456-789
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i style="color: #2a9d8f" class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Email</h5>
                                    <a href="mailto:info@seacatering.com" style="color: #2a9d8f"
                                        class="text-decoration-none">
                                        info@seacatering.com
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i style="color: #2a9d8f" class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Office Address</h5>
                                    <p>
                                        SEA Catering Headquarters<br>
                                        Jl. Sudirman No. 123<br>
                                        Jakarta Selatan 12190
                                    </p>
                                    <a href="#" style="color: #2a9d8f; border-color: #2a9d8f"
                                        class="btn btn-outline btn-sm hover-effect"
                                        onmouseover="this.style.backgroundColor='#2a9d8f'; this.style.color='white'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#2a9d8f'">
                                        <i class="fas fa-directions me-2"></i>Get Directions
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-4"><i style="color: #2a9d8f" class="fas fa-comment-dots me-2"></i> Share
                                Your Experience</h3>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('testimonials.store') }}" method="POST" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-bold">Your Name</label>
                                    <input type="text" class="form-control py-2" id="name" name="name"
                                        placeholder="Enter your name" required>
                                    <div class="invalid-feedback">
                                        Please provide your name.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="form-label fw-bold">Your Review</label>
                                    <textarea class="form-control py-2" id="message" name="message" rows="3"
                                        placeholder="Share your experience with SEA Catering" required></textarea>
                                    <div class="invalid-feedback">
                                        Please write your review (minimum 10 characters).
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Rating</label>
                                    <div class="star-rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="star{{ $i }}" name="rating"
                                                value="{{ $i }}" required>
                                            <label for="star{{ $i }}" title="{{ $i }} stars">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="fas fa-paper-plane me-2"></i> Submit Review
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold"><i style="color: #2a9d8f" class="fas fa-quote-left me-2"></i> What Our Customers Say
                    </h3>
                    <p class="text-muted">Hear from people who have experienced our service</p>
                </div>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($testimonials as $key => $testimonial)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <div class="card border-0 shadow-sm p-4 mx-auto" style="max-width: 800px;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i < $testimonial->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                            @endfor
                                        </div>
                                        <p class="fst-italic fs-5 mb-4">"{{ $testimonial->message }}"</p>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=2a9d8f&color=fff"
                                                class="rounded-circle me-3" width="60" height="60"
                                                alt="{{ $testimonial->name }}">
                                            <div>
                                                <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                                {{-- <small
                                                    class="text-muted">{{ $testimonial->created_at->format('M d, Y') }}</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 1.5rem;
            padding: 0 3px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star-rating input:not(:checked)~label:hover,
        .star-rating input:not(:checked)~label:hover~label {
            color: #fdca40;
        }

        .star-rating.was-validated:not(:has(input:checked)) {
            border: 1px solid #dc3545;
            padding: 5px;
            border-radius: 5px;
        }

        .star-rating.was-validated:not(:has(input:checked))::after {
            content: "Please select a rating";
            color: #dc3545;
            font-size: 0.875em;
            display: block;
            margin-top: 5px;
        }

        .star-rating input:checked~label {
            color: #fdca40;
        }

        .card {
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: none;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 0.875em;
        }

        .was-validated .form-control:invalid~.invalid-feedback,
        .form-control.is-invalid~.invalid-feedback {
            display: block;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #2a9d8f;
            border-radius: 50%;
            padding: 15px;
        }
    </style>

    @push('script')
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.star-rating input');
                stars.forEach(star => {
                    star.addEventListener('change', function() {
                        const rating = this.value;
                        document.querySelectorAll('.star-rating label').forEach((label, index) => {
                            label.style.color = index >= (5 - rating) ? '#fdca40' : '#ddd';
                        });
                    });
                });

                const form = document.querySelector('.needs-validation');
                if (form) {
                    form.addEventListener('submit', function(event) {
                        const ratingSelected = document.querySelector('input[name="rating"]:checked');

                        if (!ratingSelected) {
                            event.preventDefault();
                            event.stopPropagation();
                            document.querySelector('.star-rating').classList.add('was-validated');
                        }

                        form.classList.add('was-validated');
                    }, false);
                }
            });
        </script>
    @endpush

@endsection
