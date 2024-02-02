@extends('layouts.main')

@section('container')

<div class="container mt-4">
    <div class="row">
        {{-- Kolom Pertama - Card Event --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
        </div>

        {{-- Kolom Kedua - Detail Event --}}
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    {{-- Detail Event --}}
                    <p>Harga : {{ $events->price }}</p>
                    <p>Model Kegiatan : {{ $events->type }}</p>
                    <p>Kuota Peserta : {{ $events->quota }}</p>
                    <p>Waktu Pendaftaran: {{ \Carbon\Carbon::parse($events->registration_start)->format('d-m-Y H:i:s') }} s/d {{ \Carbon\Carbon::parse($events->registration_end)->format('d-m-Y H:i:s') }}</p>
                    <p>Waktu Pelaksanaan: {{ \Carbon\Carbon::parse($events->event_start)->format('d-m-Y H:i:s') }} s/d {{ \Carbon\Carbon::parse($events->event_end)->format('d-m-Y H:i:s') }}</p>
                    <p>Lokasi Pelaksanaan: {{ $events->place }}</p>
                    <p>Kontak: {{ $events->no_telp }}</p>
                </div>
            </div>

            {{-- Card Tambahan di Kolom Kedua --}}
            <div class="card">
                <div class="card-body">
                    <h5>Daftar Peserta</h5>
                    <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nama Peserta</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Daerah</th>
                          </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12">

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