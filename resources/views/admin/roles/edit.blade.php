@extends('layouts.header')

@section('content')

    <main class="content">
        @if($errors->any())
            <div class="container-fluid mb-4">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Role</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="permissions" class="form-label">Permissions</label>
                            <select id="permissions" name="permissions[]" class="form-select {{ $errors->has('permissions') ? 'is-invalid' : '' }}" multiple required>
                                @foreach($permissions as $key => $value)
                                    <option value="{{ $key }}" {{ in_array($key, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('permissions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('permissions') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
