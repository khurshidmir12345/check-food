@extends('layouts.meal_header')

@section('content')
    <div class="plans-container">
        <h1>O'zingizga Mos Rejani Tanlang</h1>
        <div class="plans-grid">
            @foreach($plans as $plan)
                <div class="plan-card">
                    <div class="plan-header">
                        <h2>{{ $plan->name }}</h2>
                        <p class="plan-type">{{ $plan->type }}</p>
                    </div>
                    <div class="plan-price">
                        <span class="currency"></span>{{ number_format($plan->price) }} UZS
                    </div>

                    <a href="{{ route('admin.prices.show', [$plan->id]) }}" type="submit" class="btn-price">Rejani Tanlash</a>

                    <div class="plan-note">
                        <span>{{$plan->type == 'monthly' ? 'Oylik Obuna' : 'Yillik Obuna'}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



