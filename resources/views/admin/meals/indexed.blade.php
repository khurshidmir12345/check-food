@extends('layouts.header')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Meals List</h1>
                <a href="{{ route('admin.taomlar.create') }}" class="btn btn-success">Add New Meal</a>
            </div>

            <div class="row">
                @foreach($dishes as $meal)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($meal->image)
                                <img src="{{ asset('storage/'.$meal->image->image_url) }}" class="card-img-top" alt="{{ $meal->name_uz }}">
                            @else
                                <img src="{{ asset('path-to-your-default-image.jpg') }}" class="card-img-top" alt="Default Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title" style="color: goldenrod;font-size: larger">{{ $meal->name_uz }}</h5>
                                <p class="card-text">{{ Str::limit($meal->instructions, 100, '...') }}</p>
                                <a href="{{ route('admin.taomlar.edit', $meal->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form method="POST" action="{{ route('admin.taomlar.destroy', $meal->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this meal?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
