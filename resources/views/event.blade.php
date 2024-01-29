@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            {{-- Title --}}
            <h2 class="mb-3">{{ $events->title }}</h2>

            {{-- Author --}}
            <p class="mb-1px">Penyelenggara : <a href="/events?author={{ $events->author->username }}" class="text-decoration-none">{{ $events->author->name }}</a></p>

            {{-- Category --}}
            <p>Kategori: <a href="/events?category={{ $events->category->slug }}" class="text-decoration-none">{{ $events->category->name }}</a></p>

            {{-- Image --}}
            @if ($events->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $events->image) }}" class="card-img-top" alt="{{ $events->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $events->category->name }}" class="card-img-top" alt="{{ $events->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5">
                {!! $events->body !!}
            </article>
        
            <a href="/events" class="text-decoration-none btn btn-primary">Back</a>
        </div>
    </div>
</div>
    
@endsection