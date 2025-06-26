@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container py-5">
        <div class="dashboard-header mb-5">
            <h2 class="fw-light mb-3">My Subscriptions</h2>
            <p class="text-muted">Manage your meal plans and delivery schedules</p>
        </div>

        @if ($subscriptions->isEmpty())
            <div class="empty-state text-center py-5">
                <div class="empty-icon mb-4">
                    <i style="color: #2a9d8f" class="fas fa-utensils fa-4x "></i>
                </div>
                <h4 class="mb-3">No Active Subscriptions</h4>
                <p class="text-muted mb-4">You don't have any active meal subscriptions yet</p>
                <a href="{{ route('subscriptions.create') }}" class="btn btn-primary px-4">
                    <i class="fas fa-plus me-2"></i> Start Subscription
                </a>
            </div>
        @else
            <div class="subscription-list">
                @foreach ($subscriptions as $subscription)
                    <div class="subscription-card card border-0 shadow-sm mb-4 overflow-hidden">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center border-0">
                            <div>
                                <h5 class="mb-0 fw-normal">
                                    <span style="color: #2a9d8f">#{{ $subscription->id }}</span>
                                    <span
                                        class="badge bg-{{ $subscription->status === 'active' ? 'success' : 'warning' }} ms-2">
                                        {{ ucfirst($subscription->status) }}
                                    </span>
                                </h5>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton{{ $subscription->id }}" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if ($subscription->status === 'active')
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#pauseModal{{ $subscription->id }}">
                                                <i class="fas fa-pause me-2 text-warning"></i> Pause
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#cancelModal{{ $subscription->id }}">
                                                <i class="fas fa-times me-2 text-danger"></i> Cancel
                                            </button>
                                        </li>
                                    @elseif($subscription->status === 'paused')
                                        <li>
                                            <form action="{{ route('subscriptions.resume', $subscription) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-play me-2 text-success"></i> Resume
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="subscription-detail mb-4">
                                        <h6 class="text-uppercase text-muted small mb-3">Plan Details</h6>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-box-open me-3" style="color: #2a9d8f"></i>
                                            <div>
                                                <h5 class="mb-0">{{ ucfirst($subscription->plan) }} Plan</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-utensils me-3" style="color: #2a9d8f"></i>
                                            <div>
                                                <p class="mb-0">
                                                    {{ implode(', ', json_decode($subscription->meal_types)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="subscription-detail mb-4">
                                        <h6 class="text-uppercase text-muted small mb-3">Delivery Info</h6>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar-day me-3" style="color: #2a9d8f"></i>
                                            <div>
                                                <p class="mb-0">
                                                    {{ implode(', ', json_decode($subscription->delivery_days)) }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-tag me-3" style="color: #2a9d8f"></i>
                                            <div>
                                                <h5 class="mb-0">Rp{{ number_format($subscription->total_price) }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($subscription->status === 'active')
                                <div class="upcoming-delivery alert alert-light border mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fas fa-truck me-2" style="color: #2a9d8f"></i>
                                            <strong>Next Delivery:</strong>
                                            <span class="ms-2">
                                                @if ($subscription->status === 'active')
                                                    {{ implode(', ', json_decode($subscription->delivery_days)) }}
                                                @else
                                                    Not available (subscription {{ $subscription->status }})
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal fade" id="pauseModal{{ $subscription->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">Pause Subscription</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('subscriptions.pause', $subscription) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p class="text-muted mb-4">Temporarily pause your meal deliveries</p>

                                        <div class="mb-3">
                                            <label class="form-label">Pause Start Date</label>
                                            <input type="date" name="pause_start" class="form-control"
                                                min="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pause End Date</label>
                                            <input type="date" name="pause_end" class="form-control"
                                                min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Confirm Pause</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="cancelModal{{ $subscription->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title text-danger">Cancel Subscription</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                                        <h5>Are you sure?</h5>
                                    </div>
                                    <p class="text-muted text-center">This will permanently cancel your subscription and
                                        stop all future deliveries.</p>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Go
                                        Back</button>
                                    <form action="{{ route('subscriptions.cancel', $subscription) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Yes, Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <style>
        .dashboard-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding-bottom: 1rem;
        }

        .subscription-card {
            border-radius: 12px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .subscription-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
        }

        .subscription-detail {
            background: rgba(42, 157, 143, 0.05);
            border-radius: 8px;
            padding: 1.25rem;
        }

        .empty-state {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            color: rgba(42, 157, 143, 0.2);
        }

        .upcoming-delivery {
            border-radius: 8px;
            border-left: 3px solid var(--primary-color);
        }
    </style>
@endsection
