@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/login') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="container">
            <div class="row justify-content-center pt-4">
                <div class="col-md-6 col-offset-6 ">
                    <div class="form-group">
                        <label for="email" class="badge badge-secondary ">Email:</label>
                        <input type="text" name="email" id="email" class="form-control mb-4">
                    </div>
                    <div class="form-group">
                        <label for="password" class="badge badge-secondary ">Password:</label>
                        <input type="text" name="password" id="password" class="form-control mb-4">
                    </div>
                    <div class="form-group ">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="usertype" id="usertypeclient" value="usertypeclient" checked>
                            <label class="form-check-label" for="usertypeclient">
                              Client
                            </label>
                          </div>
                          <div class="form-check form-check-inline pl-4">
                            <input class="form-check-input" type="radio" name="usertype" id="usertypeadmin" value="usertypeadmin">
                            <label class="form-check-label" for="usertypeadmin">
                              Admin
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Login</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
@endsection
