@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Event</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-3" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive small">
    <a href="/dashboard/events/create" class="btn btn-primary mb-3">Create New Event</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->category->name }}</td>
            <td>
                <a href="/dashboard/events/{{ $event->slug }}" class="badge bg-info dark-text"><i class="bi bi-eye"></i></a>
                <a href="/dashboard/events/{{ $event->slug }}/edit" class="badge bg-warning dark-text"><i class="bi bi-pencil"></i></a>
                <form action="/dashboard/events/{{ $event->slug }}" method="POST" class="d-inline">
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
