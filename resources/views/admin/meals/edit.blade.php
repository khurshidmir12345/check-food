@extends('layouts.header')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Meal</h5>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.taomlar.update', $taomlar->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Meal Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $taomlar->name_uz) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter meal name" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions</label>
                            <textarea id="instructions" name="instructions" rows="4" class="form-control {{ $errors->has('instructions') ? 'is-invalid' : '' }}" placeholder="Enter meal instructions" required>{{ old('instructions', $taomlar->instructions) }}</textarea>
                            @if($errors->has('instructions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instructions') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (optional)</label>
                            <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif

                            @if($taomlar->image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $taomlar->image->image_url) }}" alt="{{ $taomlar->name }}" class="img-fluid" style="max-width: 200px;">
                                    <p class="mt-2">Current Image</p>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Meal</button>
                            <a href="{{ route('admin.taomlar.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
