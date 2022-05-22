@extends('layout')

@section('content')

<div>
<section>
    <h2 class="opacity-75 fs-3"><i class="bi bi-box-arrow-in-right"></i></h2>
        <div class="col-md-4 container">
            <form method="POST" action="/login">
            @csrf
                <br>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                    <input type="email" class="opacity-50 form-control" id="email" name="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                    <input type="password" class="opacity-50 form-control" id="password" name="password">
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

                <button type="submit" id="submit-button" class="btn btn-dark">login</button>

            </form>
        </div>
</section>

</div>

@endsection