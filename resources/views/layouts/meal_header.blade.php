<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Vegetable Dish Selector</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/veggie_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/price_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <!-- Font Awesome for Icons -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

<!-- Menu Bar -->
<div class="menu-bar">
    <div class="logo">
        <a href="/">TheDevs</a>
    </div>
    <div class="menu-toggle" id="menu-toggle">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav id="nav-menu">
        <ul>
            <li><a href="/">Bosh Sahifa</a></li>
            @can('user_access')
                <li><a href="{{route('admin.prices.index')}}">To'lovlar</a></li>
            @endcan
            @if(in_array('1' , auth()->user()->roles->pluck('id')->toArray()))
                <li ><a style="background-color: darkgoldenrod;color: white;padding: 8px;border-radius: 50%" href="{{route('admin.layaouts.header')}}">admin</a></li>
            @endif
            {{--                <li><a href="/recipes">Recipes</a></li>--}}
        </ul>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn logout-btn">
                {{ __('Log Out') }}
            </button>
        </form>
        <a href="{{ route('profile.edit') }}" class="profile-link">
            {{ __('Profile') }}
        </a>
    </nav>
</div>

@yield('content')


@yield('scripts')


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const navMenu = document.getElementById('nav-menu');

        menuToggle.addEventListener('click', function () {
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
            } else {
                navMenu.classList.add('active');
            }
        });
    });


    function submitVegetables(event) {
        event.preventDefault();
        const form = event.target;
        fetch(form.getAttribute('action'), {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                alert('Vegetables added successfully!');
            })
            .catch(error => console.error('Error submitting vegetables:', error));
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
