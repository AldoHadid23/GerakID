@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>
    
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/events">
                @if (request('category'))

                <input type="hidden" name="category" value="{{ request('category') }}">
                    
                @endif
                @if (request('author'))

                <input type="hidden" name="author" value="{{ request('author') }}">
                    
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $events->links() }}
    </div>

    @if ($events->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400?{{ $events[0]->category->name }}" class="card-img-top" alt="{{ $events[0]->category->name }}">
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/events/{{ $events[0]->slug }}" class="text-decoration-none text-dark">{{ $events[0]->title }}</a></h3>

            <p class="mb-1px">
                <small class="text-body-secondary">
                    Penyelenggara : <a href="/events?author={{ $events[0]->author->username }}" class="text-decoration-none">{{ $events[0]->author->name }}</a>
                </small>
            </p>
            <p>
                <small class="text-body-secondary">
                    Kategori: <a href="/events?category={{ $events[0]->category->slug }}" class="text-decoration-none">{{ $events[0]->category->name }}</a>
                </small>
            </p>
            <p class="card-text">{{ $events[0]->excerpt }}</p>

            <a href="/events/{{ $events[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

            <p class="card-text">
                <small class="text-body-secondary">{{ $events[0]->created_at->diffForHumans() }}</small>
            </p>
        </div>
    </div>


    <div class="container">
        <div class="row">

            @foreach ($events->skip(1) as $event)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.3)"><a href="/events?category={{ $event->category->slug }}" class="text-decoration-none text-white">{{ $event->category->name }}</a></div>
                    <img src="https://source.unsplash.com/500x400?{{ $event->category->name }}" class="card-img-top" alt="{{ $event->category->name }}">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/events/{{ $event->slug }}" class="text-decoration-none text-dark">{{ $event->title }}</a></h5>
                        <p class="mb-1px">Penyelenggara : <a href="/events?author={{ $event->author->username }}" class="text-decoration-none">{{ $event->author->name }}</a></p>
                        <p class="card-text">{{ $event->excerpt }}</p>
                        <p class="card-text">
                            <small class="text-body-secondary">{{ $event->created_at->diffForHumans() }}</small>
                        </p>
                        <a href="/events/{{ $event->slug }}" class="btn btn-primary">Read More...</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    @else
    <p class="text-center fs-4">No Post Found.</p>
    @endif

@endsection

