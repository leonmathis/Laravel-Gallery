@extends('layout')

@section('content')

<div class="container">
<section id="contact">

    <div id="userdiv" class="container col-md-12 pt-5">
        <div class="row pt-5">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card border-dark">
                    <div class="card-body text-center m-3">
                        <h5 class="card-title">{{ $user->firstname }} {{ $user->lastname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
                        <a href="/admin/user/edit/{{ $user->id }}" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="/admin/album/{{ $user->id }}" class="btn btn-dark"><i class="bi bi-images"></i></a>
                        @if(!$user->is_admin)
                        <form action="/admin/user/delete/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark mt-1" title="delete"><i class="bi bi-x-circle"></i></button>
                        </form>
                        @endif
                    </div>
                </div>  
            </div>
        @endforeach
        </div>
    </div>
    
</section>
</div>

@endsection