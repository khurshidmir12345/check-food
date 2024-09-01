@extends('layouts.header')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between mb-3">
                <h1 class="h3">Permissions Management</h1>
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success">Create New Permission</a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Permissions List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-info btn-sm me-2" title="Edit">
                                            <i class="align-middle" data-feather="edit"></i> Edit
                                        </a>

                                        <form method="POST" action="{{ route('admin.permissions.destroy', [$permission->id]) }}" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
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
