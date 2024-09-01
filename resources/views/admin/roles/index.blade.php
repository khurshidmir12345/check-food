@extends('layouts.header')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between mb-3">
                <h1 class="h3">Roles Management</h1>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Create New Role</a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Roles List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge bg-primary">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info btn-sm me-2">
                                            <i class="align-middle" data-feather="edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.roles.destroy', [$role->id]) }}" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="align-middle" data-feather="trash-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
