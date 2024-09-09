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
                <div class="payment-options">
                    <div class="payment-card" data-payment-type="Payme">
                        <img src="{{ asset('img/img_2.png') }}" alt="Payme" class="payment-icon">
                    </div>
                    <div class="payment-card" data-payment-type="Click">
                        <img src="{{ asset('img/img_4.png') }}" alt="Click" class="payment-icon">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel">Bekor qilish</button>
            </div>
        </div>
    </div>

    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .plans-container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 20px;
        }

        .plans-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .plan-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .plan-header h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #1a73e8;
        }

        .plan-price {
            margin: 15px 0;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .btn-select-plan {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-select-plan:hover {
            background-color: #0d5bb8;
        }
    </style>
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
            var cancelBtn = document.querySelector('.btn-cancel');

            btns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    selectedPlanId = btn.getAttribute('data-plan-id');
                    modal.style.display = 'flex';
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

            cancelBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
        });
    </script>
@endsection
