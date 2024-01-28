@extends('layouts.main')

@section('container')
<h1 class="mb-5">Event Categories : {{ $category }}</h1>
    
    @foreach ($events as $event)
        <article class="mb-5">
            <h2>
                <a href="/events/{{ $event->slug }}">{{ $event->title }}</a>
            </h2>
            <h5>Penyelenggara: <a href="authors/{{ $event->author->username }}">{{ $event->author->name }}</a></h5>
            <p>{{ $event->excerpt }}</p>
        </article>

    @endforeach

@endsection

