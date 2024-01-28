@extends('layouts.main')

@section('container')
    <h1>{{ $nama }}</h1>
    <img src="img/{{ $image }}" alt="PDIP" width="200" class="img-thumbnail">
@endsection