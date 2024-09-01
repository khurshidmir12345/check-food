@extends('layouts.header')
@section('content')

    <div class="main">
        <main class="content">
            <div class="container-fluid p-0">
                <div class="card shadow-sm border-0" style="max-width: 400px; margin: auto;">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/avatars/avatar.jpg') }}" width="100" height="100" class="rounded-circle border border-primary mb-3" alt="User Avatar">
                        <h5 class="mb-2">{{ $user->name }}</h5>
                        <p class="text-muted mb-3">{{ $user->email }}</p>
                        <div class="btn-group">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
