@extends('layout')

@section('content')

<div>
<section id="contact">
    <div class="container col-md-12 pt-5">
        <div class="row pt-5">

        @if(count($medias) == 0)
            <div class="col-md-12 mb-4 text-center">
                <p>The album is empty</p>
            </div>
        @else

            @foreach ($medias as $media)
                <div class="col-md-4 mb-4">
                    <div class="card border-dark">
                        <a href="/view/image/{{ $media->id }}"><img src="{{ asset('images/' . $media->path) }}" class="card-img-top" height="270px" width="420px"></a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $media->name }}</h5>
                            <p class="card-text">posted by {{ $media->user->email }}</p>
                            <p class="card-text">{{ $media->description }}</p>
                            @if(auth()->user()->id == $media->user_id || auth()->user()->is_admin == 1)
                            <a href="/image/edit/{{ $media->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                            <form action="/image/delete/{{ $media->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-dark" title="delete"><i class="bi bi-x-circle"></i></button>
                            </form>
                            @endif
                        </div>
                    </div>  
                </div>
            @endforeach

        @endif
        </div>
    </div>

</section>
</div>

@endsection