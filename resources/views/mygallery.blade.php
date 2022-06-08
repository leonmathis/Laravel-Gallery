@extends('layout')

@section('content')

<div>
<section id="contact">
    <div class="container col-md-12 pt-5">
        <div class="row pt-5">
        @foreach ($medias as $media)
            <div class="col-md-4 mb-4">
                <div class="card border-dark">
                    <a href="/view/image/{{ $media->id }}"><img src="{{ asset('images/' . $media->path) }}" class="card-img-top" height="270px" width="420px"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $media->name }}</h5>
                        <p class="card-text">{{ $media->album->name }}</p>
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
    </div>

</section>
</div>

@endsection