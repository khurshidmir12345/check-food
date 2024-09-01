@extends('layouts.meal_header')

@section('content')
    <div class="plans-container">
        <h1>O'zingizga Mos Rejani Tanlang</h1>
        <div class="plans-grid">
            @foreach($plans as $plan)
                <div class="plan-card">
                    <div class="plan-header">
                        <h2>{{$plan->name == 'Pro Monthly' ? 'Oylik Obuna' : 'Yillik Obuna'}}</h2>
                        <p class="plan-type">{{ $plan->type }}</p>
                    </div>
                    <div class="plan-price">
                        <span class="currency"></span>{{ number_format($plan->price) }} UZS
                    </div>

                    <button data-plan-id="{{ $plan->id }}" class="btn-price btn-select-plan">Rejani Tanlash</button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Payment Type Modal -->
    <div id="payment-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>To'lov Turini Tanlang</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="payment-card" data-payment-type="Payme">
                    <img src="{{ asset('img/img_2.png') }}" alt="payme" class="payment-icon">
                </div>
                <div class="payment-card" data-payment-type="Click">
                    <img src="{{ asset('img/img_1.png') }}" alt="click" class="payment-icon">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('payment-modal');
            var btns = document.querySelectorAll('.btn-select-plan');
            var close = document.querySelector('.close');
            var paymentCards = document.querySelectorAll('.payment-card');
            var selectedPlanId = null;
            var selectedPaymentType = null;

            btns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    selectedPlanId = btn.getAttribute('data-plan-id');
                    modal.style.display = 'block';
                });
            });

            close.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            paymentCards.forEach(function(card) {
                card.addEventListener('click', function() {
                    selectedPaymentType = card.getAttribute('data-payment-type');
                    if (selectedPlanId && selectedPaymentType) {
                        window.location.href = `/admin/prices/show/${selectedPlanId}?payment_type=${selectedPaymentType}`;
                    }
                    modal.style.display = 'none';
                });
            });

            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
        });
    </script>
@endsection
