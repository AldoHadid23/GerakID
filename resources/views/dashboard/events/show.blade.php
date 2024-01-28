@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $event->title }}</h2>

            <a href="/dashboard/events" class="text-decoration-none btn btn-primary mb-3">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="/dashboard/events/{{ $event->slug }}/edit" class="text-decoration-none btn btn-warning mb-3">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="/dashboard/events/{{ $event->slug }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger mb-3" onclick="return confirm('Are You Sure?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>

            @if ($event->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $event->category->name }}" class="card-img-top" alt="{{ $event->category->name }}" class="img-fluid">
            @endif



            <article class="my-3 fs-5">
                {!! $event->body !!}
            </article>
    
        </div>
    </div>
</div>
    
@endsection
