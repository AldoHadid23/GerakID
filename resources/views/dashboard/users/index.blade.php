@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin Users</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-3" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive small col-lg-6">
<a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New User</a>
<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Is Admin?</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td class="text-center">
            @if ($user->is_admin == 1)
                Yes
            @else
                No
            @endif
        </td>
        <td>
            <a href="/dashboard/users/{{ $user->id }}" class="badge bg-info dark-text"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning dark-text"><i class="bi bi-pencil"></i></a>
            <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline">
                @csrf
                @method('put')
                <button type="submit" class="badge bg-success border-0" onclick="return confirm('Are You Sure?')">
                    <i class="bi bi-person"></i>
                </button>
            </form>
            <form action="/dashboard/users/{{ $user->slug }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
</div>


@endsection