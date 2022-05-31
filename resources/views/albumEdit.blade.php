@extends('layout')

@section('content')

<div>
<section>
    <h2 class="opacity-75 fs-3"><i class="bi bi-pencil-square"></i></h2>
        <div class="col-md-4 container">
            <form method="POST" action="">
            @csrf
            @method('PUT')
                <br>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">name</label>
                    <div class="col-sm-10">
                    <input type="text" class="opacity-50 form-control" id="name" name="name" value="{{ $album->name }}">
                    </div>
                </div>

                @if ($errors->any())
                <div class="row mb-3 mt-3">
                    <div class="col-sm-12 alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <button type="submit" id="submit-button" class="btn btn-dark">submit</button>
            </form>

            <form action="/album/delete/{{ $album->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-dark" title="delete"><i class="bi bi-x-circle"></i></button>
            </form>
</div>
</section>

</div>

@endsection