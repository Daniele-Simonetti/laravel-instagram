@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($photos as $photo)
                    <div class="card mb-3">
                        <img src="{{ $photo->url }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{ $photo->user()->first()->name }}</h3>
                            <h5 class="card-title">{{ $photo->name }}</h5>
                            <p class="card-text">{{ $photo->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($photo->comments()->get() as $comment)
                                <li class="list-group-item"><strong>{{ $comment->user()->first()->name }}:</strong> {{ $comment->content }}</li>
                            @endforeach
                        </ul>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $photos->links() }}
        </div>
    </div>
    </div>
@endsection
