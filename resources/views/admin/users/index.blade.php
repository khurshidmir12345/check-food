@extends('layouts.header')
@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            @can('user_create')
                <div class="mb-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                        <i class="align-middle" data-feather="plus"></i> Create New User
                    </a>
                </div>
            @endcan

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @can('user_update')
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm me-2">
                                                <i class="align-middle" data-feather="eye"></i> View
                                            </a>
                                        @endcan

                                        @can('user_delete')
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                                    <i class="align-middle" data-feather="trash-2"></i> Delete
                                                </button>
                                            </form>
                                        @endcan

                                        @can('user_update')
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm ms-2">
                                                <i class="align-middle" data-feather="edit"></i> Edit
                                            </a>
                                        @endcan
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
