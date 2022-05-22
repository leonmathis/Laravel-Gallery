@extends('layout')

@section('content')

<div>
<section>
    <h2 class="opacity-75 fs-3">Register</h2>
        <div class="col-md-4 container">
            <form method="POST" action="/register">
            @csrf
                <br>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">firstname</label>
                    <div class="col-sm-10">
                    <input type="text" class="opacity-50 form-control" id="firstname" name="firstname">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">lastname</label>
                    <div class="col-sm-10">
                    <input type="text" class="opacity-50 form-control" id="lastname" name="lastname">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">email</label>
                    <div class="col-sm-10">
                    <input type="email" class="opacity-50 form-control" id="email" name="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">password</label>
                    <div class="col-sm-10">
                    <input type="password" class="opacity-50 form-control" id="password" name="password">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label" style="colour: #4d4d4d;">confirm</label>
                    <div class="col-sm-10">
                    <input type="password" class="opacity-50 form-control" id="password_confirmation" name="password_confirmation">
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