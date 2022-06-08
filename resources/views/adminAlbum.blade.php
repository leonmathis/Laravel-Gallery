@extends('layout')

@section('content')

<div>
<section id="contact">

    <div class="container cards">
        @foreach ($albums as $album)
            <div class="col-6 m-2">
                <div class="card border-dark col-md-12">
                    <img src="{{ asset('images/' . $album->cover) }}" class="card-img-top" height="270px" width="420px">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">created by {{ $album->user->firstname }} {{ $album->user->lastname }}</p>
                        <a href="/album/edit/{{ $album->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="/album/add/image/{{ $album->id }}" class="btn btn-dark"><i class="bi bi-upload"></i></a>
                        <a href="/album/view/{{ $album->id }}" class="btn btn-dark"><i class="bi bi-view-list"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</section>
</div>

@endsection