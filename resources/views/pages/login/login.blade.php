@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/dashboard') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <div class="container">
            <div class="row justify-content-center pt-4">
                <div class="col-md-6 col-offset-6 ">
                    <div class="gorm-group">
                        <label for="email" class="badge badge-secondary ">Email:</label>
                        <input type="text" name="email" id="email" class="form-control mb-4">
                    </div>
                    <div class="gorm-group">
                        <label for="password" class="badge badge-secondary ">Password:</label>
                        <input type="text" name="password" id="password" class="form-control mb-4">
                    </div>
                    <div class="gorm-group">
                        <button type="submit" class="btn btn-primary form-control">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
