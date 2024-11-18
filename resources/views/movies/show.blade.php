@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movie List</h1>

    @if($movies->isEmpty())
        <p>No movies available.</p>
    @else
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
