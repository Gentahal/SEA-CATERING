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

                            <form class="needs-validation" action="{{ route('testimonials.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-bold">Your Name</label>
                                    <input name="name" type="text" class="form-control py-2" id="name"
                                        placeholder="Enter your name" required>
                                    <div class="invalid-feedback">
                                        Please provide your name.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="review" class="form-label fw-bold">Your Review</label>
                                    <textarea name="message" class="form-control py-2" id="review" rows="3" placeholder="Share your experience with SEA Catering"
                                        required></textarea>
                                    <div class="invalid-feedback">
                                        Please write your review.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Rating</label>
                                    <div class="star-rating">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star1" name="rating" value="1" required>
                                        <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                    </div>
                                    <div class="invalid-feedback d-block">
                                        Please select a rating.
                                    </div>
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
                    <h3 class="fw-bold"><i style="color: #2a9d8f" class="fas fa-quote-left me-2"></i> What Our Customers
                        Say</h3>
                    <p class="text-muted">Hear from people who have experienced our service</p>
                </div>

                <div class="row g-4">
                    @foreach ([['name' => 'Ayu Puspita', 'review' => 'Makanannya tidak hanya sehat tapi juga sangat enak! Sudah 6 bulan berlangganan dan tidak pernah kecewa.', 'rating' => 5, 'photo' => 'women/32'], ['name' => 'Budi Santoso', 'review' => 'Pengiriman selalu tepat waktu dan packaging sangat rapi. Menu untuk diabetesnya membantu menjaga gula darah saya stabil.', 'rating' => 4, 'photo' => 'men/45'], ['name' => 'Citra Dewi', 'review' => 'Variasi menu bagus banget, tidak membosankan. Anak-anak yang biasanya picky eater jadi doyan makan sayur sejak berlangganan SEA Catering.', 'rating' => 5, 'photo' => 'women/68']] as $testimonial)
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://randomuser.me/api/portraits/{{ $testimonial['photo'] }}.jpg"
                                            class="rounded-circle me-3" width="60" height="60"
                                            alt="{{ $testimonial['name'] }}">
                                        <div>
                                            <h5 class="fw-bold mb-0">{{ $testimonial['name'] }}</h5>
                                            <div class="text-warning">
                                                @for ($i = 0; $i < $testimonial['rating']; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @for ($i = $testimonial['rating']; $i < 5; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">"{{ $testimonial['review'] }}"</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    </style>

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
    </script>
@endsection
