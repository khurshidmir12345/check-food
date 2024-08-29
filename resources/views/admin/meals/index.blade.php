@extends('layouts.meal_header')

@section('content')

    <!-- Random Dish Container -->
    <div class="random-dish-container">
        @if(!isset($dish))
            <h1><i class="fa-solid fa-utensils"></i> O‘zingizni Asl Oshpazdek His Qiling 👩🏻‍🍳!</h1>
            <div id="dish-name" style="font-size: larger">Har Kuni Nima Pishirishni O‘ylash Sizni Charchatdimi? Muammoni Bizga Topshiring!</div>
        @endif

        <!-- Dish Display -->
        <div class="random-dish">
            <div class="dish-name">{{ 'Bugun nima pishiraman 🤔 ?' }}</div>
            @if(isset($dish))
                <div class="dish-name" style="color: orange">{{ $dish->name_uz }}</div>
                @if(isset($image))
                    <div class="dish-image">
                        <img src="{{ asset('storage/'.$image->image_url) }}" alt="{{ $dish->name_uz }}" style="width: 300px; height: auto; border-radius: 8px;">
                    </div>
                @endif
                <div class="dish-description" style="font-size: larger; font-weight: bold">
                    {{ $dish->instructions }}
                </div>
            @endif

            <!-- Random Dish Button -->
            <form action="{{ route('admin.random-dish') }}" method="POST" id="randomDishForm">
                @csrf
                <button type="submit" class="btn" id="randomDishButton">
                    <i class="fa-solid fa-shuffle"></i> Bugun nima taom yeymiz!
                </button>
                <div id="countdown" style="margin-top: 15px; font-size: 1rem; color: goldenrod; display: none; font-weight: bolder">
                    Qayta urinish uchun: <span id="seconds">10</span> soniya kuting !
                </div>
            </form>
        </div>

        @if(session('submitted'))
            <script>
                var button = document.getElementById('randomDishButton');
                var countdown = document.getElementById('countdown');
                var seconds = document.getElementById('seconds');
                var timeLeft = 10;

                button.disabled = true; // Disable the button
                countdown.style.display = 'block'; // Show the countdown

                var timer = setInterval(function() {
                    timeLeft--;
                    seconds.textContent = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        button.disabled = false; // Re-enable the button
                        countdown.style.display = 'none'; // Hide the countdown
                    }
                }, 1000);
            </script>
    @endif

@endsection
