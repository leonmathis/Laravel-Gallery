@extends('layout')

@section('content')

<div>
<section id="contact">

    <div class="container cards">
        @foreach ($medias as $media)
            <div class="col-6 m-2">
                <div class="card border-dark col-md-12">
                    <img src="{{ asset('images/' . $media->path) }}" class="card-img-top" height="270px" width="420px">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $media->name }}</h5>
                        <p class="card-text">posted by {{ $media->user->email }}</p>
                        <p class="card-text">{{ $media->description }}</p>
                        <a href="/image/edit/{{ $media->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <form action="/image/delete/{{ $media->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark" title="delete"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</section>
</div>

@endsection