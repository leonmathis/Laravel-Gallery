@extends('layout')

@section('content')

<div class="container">
<section id="contact">

    <div id="buttondiv" class="container col-md-12 pt-5 text-center">
        <div class="row pt-5">
        <div class="col-md-5"></div>
        <div class="list-group col-md-2">
            <button type="button" id="popuserbtn" class="list-group-item list-group-item-action" onclick="popUser()"><i class="bi bi-person-circle"></i></button>
            <button type="button" id="popalbumbtn" class="list-group-item list-group-item-action" onclick="popAlbum()"><i class="bi bi-journal-album"></i></button>
            <button type="button" id="popmediabtn" class="list-group-item list-group-item-action" onclick="popMedia()"><i class="bi bi-images"></i></button>
        </div>
        <div class="col-md-5"></div>
        </div>
    </div>

    <div id="userdiv" class="container col-md-12 pt-5">
        <div class="row pt-5">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card border-dark">
                    <div class="card-body text-center m-3">
                        <h5 class="card-title">{{ $user->firstname }} {{ $user->lastname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
                        <a href="/admin/user/edit/{{ $user->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <form action="/admin/user/delete/{{ $user->id }}" method="POST">
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

    <div id="albumdiv" class="container col-md-12 pt-5">
        <div class="row pt-5">
        @foreach ($albums as $album)
            <div class="col-md-4 mb-4">
                <div class="card border-dark">
                    <img src="{{ asset('images/' . $album->cover) }}" class="card-img-top" height="270px" width="420px">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <a href="/album/edit/{{ $album->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <form action="/album/delete/{{ $album->id }}" method="POST">
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

    <div id="mediadiv" class="container col-md-12 pt-5">
        <div class="row pt-5">
        @foreach ($medias as $media)
            <div class="col-md-4 mb-4">
                <div class="card border-dark">
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
    </div>
    
</section>
</div>

@endsection