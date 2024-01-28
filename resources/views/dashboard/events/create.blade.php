@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Event</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/events" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- Form Title --}}
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            {{-- Form Slug --}}
            <div class="mb-3">
              <label for="slug" class="form-label">Slug (Otomatis sesuai judul)</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug') }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            {{-- Form Category --}}
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                  @if (old('category_id') == $category->id)  
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            {{-- Form Gambar --}}
            <div class="mb-3">
              <label for="image" class="form-label @error('image') is-invalid @enderror">Event Image</label>
              <input class="form-control" type="file" id="image" name="image">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>

            {{-- Form Body --}}
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body') 
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('input', function()
        {
            fetch('/dashboard/events/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e)
        {
            e.preventDefault();
        });
    </script>
@endsection