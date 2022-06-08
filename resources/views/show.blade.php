@extends('layout')

@section('content')

<div>
<section id="contact">
    <div class="container col-md-12 pt-5">
        <div class="row pt-5">
            <div class="col-md-12 mb-4">
                    <img src="{{ asset('images/' . $media->path) }}" class="card-img-top" height="600px" width="420px">
            </div>
        </div>
    </div>

</section>
</div>

@endsection