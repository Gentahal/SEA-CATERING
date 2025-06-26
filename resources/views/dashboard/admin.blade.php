@extends('layouts.app')

@section('title', 'Admin Dashboard - SEA Catering')

@section('content')
    <div class="admin-dashboard">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 style="color: #2a9d8f" class="display-6 fw-bold ">
                <i class="fas fa-chart-line me-2"></i> Admin Dashboard
            </h1>
            <form method="GET" class="d-flex gap-3">
                <div class="input-group" style="width: 200px;">
                    <span class="input-group-text bg-white"><i class="fas fa-calendar-day"></i></span>
                    <input type="date" name="start_date" value="{{ $start }}" class="form-control border-start-0">
                </div>
                <div class="input-group" style="width: 200px;">
                    <span class="input-group-text bg-white"><i class="fas fa-calendar-day"></i></span>
                    <input type="date" name="end_date" value="{{ $end }}" class="form-control border-start-0">
                </div>
                <button class="btn btn-primary px-4">
                    <i class="fas fa-filter me-2"></i> Filter
                </button>
            </form>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">New Subscriptions</h6>
                                <h3 class="mb-0 fw-bold">{{ $totalNew }}</h3>
                                <small class="{{ $growthPercentage >= 0 ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $growthPercentage >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }} me-1"></i>
                                    {{ abs($growthPercentage) }}% {{ $growthPercentage >= 0 ? 'growth' : 'decline' }}
                                </small>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                <i class="fas fa-user-plus text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary">Period: {{ $start }} to
                                {{ $end }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Monthly Revenue</h6>
                                <h3 class="mb-0 fw-bold">Rp{{ number_format($totalMRR) }}</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                                <i class="fas fa-wallet text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-success bg-opacity-10 text-success">Active subscriptions only</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Reactivations</h6>
                                <h3 class="mb-0 fw-bold">{{ $reactivations }}</h3>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                                <i class="fas fa-sync-alt text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-warning bg-opacity-10 text-warning">Previously paused</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Total Active</h6>
                                <h3 class="mb-0 fw-bold">{{ $totalActive }}</h3>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                                <i class="fas fa-users text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-info bg-opacity-10 text-info">Current subscribers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-chart-pie me-2"></i> Subscription Analytics
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="subscriptionChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-bell me-2"></i> Recent Activity
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                            style="height: 250px;">
                            <p class="text-muted">Activity log will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('subscriptionChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                                label: 'New Subscriptions',
                                data: @json($subscriptionCounts),
                                backgroundColor: 'rgba(42, 157, 143, 0.7)',
                                borderColor: 'rgba(42, 157, 143, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Revenue (Rp)',
                                data: @json($revenueData),
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                type: 'line',
                                yAxisID: 'y1'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Subscriptions'
                                }
                            },
                            y1: {
                                beginAtZero: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Revenue'
                                },
                                grid: {
                                    drawOnChartArea: false
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush

    <style>
        .admin-dashboard {
            padding: 2rem 0;
        }

        .card {
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .input-group-text {
            border-right: none;
        }

        .form-control.border-start-0 {
            border-left: none;
        }
    </style>
@endsection