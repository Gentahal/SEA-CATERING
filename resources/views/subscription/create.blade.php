@extends('layouts.app')

@section('title', 'Subscription - SEA Catering')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div style="background-color: #2a9d8f" class="card-header text-white py-3">
                    <h2 class="text-center mb-0"><i class="fas fa-calendar-check me-2"></i> Form Berlangganan</h2>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('subscriptions.store') }}" id="subscriptionForm">
                        @csrf
                        
                        <div class="mb-4">
                            <h5 style="color: #2a9d8f" class="mb-3"><i class="fas fa-user-circle me-2"></i> Informasi Pribadi</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-lg" required placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nomor HP Aktif <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control form-control-lg" required placeholder="Contoh: 08123456789">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 style="color: #2a9d8f" class=" mb-3"><i class="fas fa-utensils me-2"></i> Pilihan Paket</h5>
                            <label class="form-label fw-bold">Pilih Paket <span class="text-danger">*</span></label>
                            <div class="row g-3 plan-options">
                                <div class="col-md-4">
                                    <div class="card plan-card" data-plan="diet">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Diet Plan</h5>
                                            <p class="text-muted">Menu rendah kalori</p>
                                            <div style="color: #2a9d8f" class="display-6 fw-bold">Rp30.000</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card plan-card" data-plan="protein">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Protein Plan</h5>
                                            <p class="text-muted">Protein tinggi</p>
                                            <div style="color: #2a9d8f" class="display-6 fw-bold">Rp40.000</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card plan-card" data-plan="royal">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Royal Plan</h5>
                                            <p class="text-muted">Menu premium</p>
                                            <div style="color: #2a9d8f" class="display-6 fw-bold">Rp60.000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="plan" id="selectedPlan" required>
                        </div>

                        <div class="mb-4">
                            <h5 style="color: #2a9d8f" class="mb-3"><i class="fas fa-clock me-2"></i> Waktu Makan</h5>
                            <label class="form-label fw-bold">Pilih Jenis Makan <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                @foreach(['breakfast'=>'Sarapan', 'lunch'=>'Makan Siang', 'dinner'=>'Makan Malam'] as $value => $label)
                                <div class="col-md-4">
                                    <div class="form-check card p-3 meal-option">
                                        <input class="form-check-input" type="checkbox" name="meal_types[]" id="meal_{{ $value }}" value="{{ $value }}">
                                        <label class="form-check-label fw-bold" for="meal_{{ $value }}">
                                            <i class="fas fa-{{ $value == 'breakfast' ? 'sun' : ($value == 'lunch' ? 'utensils' : 'moon') }} me-2"></i> {{ $label }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 style="color: #2a9d8f" class="mb-3"><i class="fas fa-calendar-day me-2"></i> Hari Pengiriman</h5>
                            <label class="form-label fw-bold">Pilih Hari Pengiriman <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                @foreach(['senin'=>'Senin', 'selasa'=>'Selasa', 'rabu'=>'Rabu', 'kamis'=>'Kamis', 'jumat'=>'Jumat', 'sabtu'=>'Sabtu', 'minggu'=>'Minggu'] as $value => $label)
                                <div class="col-4 col-md-3 col-lg-2">
                                    <div class="form-check card p-2 day-option">
                                        <input class="form-check-input" type="checkbox" name="delivery_days[]" id="day_{{ $value }}" value="{{ $value }}">
                                        <label class="form-check-label" for="day_{{ $value }}">{{ $label }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 style="color: #2a9d8f" class="mb-3"><i class="fas fa-allergies me-2"></i> Informasi Tambahan</h5>
                            <label class="form-label fw-bold">Alergi / Preferensi Makanan</label>
                            <textarea name="allergies" class="form-control" rows="3" placeholder="Contoh: Alergi seafood, tidak suka pedas, vegetarian, dll"></textarea>
                        </div>

                        <div class="bg-light p-4 rounded-3 mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold">Total Pembayaran:</h5>
                                <div style="color: #2a9d8f" class="display-5 fw-bold" id="totalPriceDisplay">Rp0</div>
                            </div>
                            <p class="small text-muted mb-0">*Perhitungan berdasarkan 4.3 minggu per bulan</p>
                            <input type="hidden" name="total_price" id="totalPriceValue">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-bold">
                                <i class="fas fa-paper-plane me-2"></i> Daftar Berlangganan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .plan-card {
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .plan-card:hover, .plan-card.selected {
        border-color: var(--primary-color);
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .meal-option, .day-option {
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .meal-option:hover, .day-option:hover {
        background-color: rgba(42, 157, 143, 0.1);
    }
    
    .form-check-input:checked + .form-check-label {
        color: var(--primary-color);
        font-weight: bold;
    }
    
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }
</style>

<script>
    const planPrices = {
        'diet': 30000,
        'protein': 40000,
        'royal': 60000
    };

    document.querySelectorAll('.plan-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.plan-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            const plan = this.dataset.plan;
            document.getElementById('selectedPlan').value = plan;
            updateTotal();
        });
    });

    function updateTotal() {
        const plan = document.getElementById('selectedPlan').value;
        if (!plan) return;

        const planPrice = planPrices[plan];
        const mealCount = document.querySelectorAll('input[name="meal_types[]"]:checked').length;
        const dayCount = document.querySelectorAll('input[name="delivery_days[]"]:checked').length;

        if (mealCount > 0 && dayCount > 0) {
            const total = Math.round(planPrice * mealCount * dayCount * 4.3);
            document.getElementById('totalPriceDisplay').textContent = 'Rp' + total.toLocaleString('id-ID');
            document.getElementById('totalPriceValue').value = total;
        } else {
            document.getElementById('totalPriceDisplay').textContent = 'Rp0';
            document.getElementById('totalPriceValue').value = '';
        }
    }

    document.querySelectorAll('input[name="meal_types[]"], input[name="delivery_days[]"]').forEach(input => {
        input.addEventListener('change', updateTotal);
    });

    document.getElementById('subscriptionForm').addEventListener('submit', function(e) {
        const plan = document.getElementById('selectedPlan').value;
        const meals = document.querySelectorAll('input[name="meal_types[]"]:checked').length;
        const days = document.querySelectorAll('input[name="delivery_days[]"]:checked').length;
        
        if (!plan || meals === 0 || days === 0) {
            e.preventDefault();
            alert('Silakan lengkapi semua field yang wajib diisi!');
        }
    });
</script>
@endsection