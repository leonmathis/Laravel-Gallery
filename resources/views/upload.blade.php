@extends('layout')

@section('content')

<div>
<section>
    <h2 class="opacity-75 fs-3"><i class="bi bi-image-fill"></i></h2>
        <div class="col-md-4 container">
            <form method="POST" action="{{ $album->id }}" enctype="multipart/form-data">
            @csrf
                <br>

                <div class="row mb-3">
                    <div class="col-sm-12">
                    <input type="file" class="opacity-50 form-control" id="image" name="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">name</label>
                    <div class="col-sm-10">
                    <input type="text" class="opacity-50 form-control" id="name" name="name">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">description</label>
                    <div class="col-sm-10">
                    <textarea type="text" class="opacity-50 form-control" id="description" name="description"></textarea>
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
</div>
</section>

</div>

@endsection