@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h1 class="h1 pb-4">Ajouter un Client</h1>

                <form method="POST" action="{{ url('/admin/client') }}" enctype="multipart/form-data" class="form mt-4">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <label for="nomclient" >Nom :</label>
                        <input type="text" id="nomclient" name="nomclient" class="form-control "
                            value="{{ old('nomclient') }}">
                    </div>

                    <div class="form-group @if ($errors->get('prenomclient')) has-error @endif">
                        <label for="prenomclient" >Prenom :</label>
                        <textarea name="prenomclient" id="prenomclient"
                            class="form-control ">{{ old('prenomclient') }}</textarea>
                    </div>

                    <div class="form-group ">
                        <label for="nomville" >Ville :</label><br>
                        <select class="form-select mb-3" aria-label="villes" name="villes">
                            <option selected value="">Selectionner ville</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nomville }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group @if ($errors->get('telephoneclient')) has-error @endif">
                        <label for="telephoneclient" >Telephone :</label>
                        <input type="text" name="telephoneclient" id="telephoneclient" class="form-control "
                            value="{{ old('telephoneclient') }}">
                    </div>

                    <div class="form-group @if ($errors->get('adresseclient')) has-error @endif">
                        <label for="adresseclient" >Adresse :</label>
                        <input type="text" name="adresseclient" id="adresseclient" class="form-control "
                            value="{{ old('adresseclient') }}">
                    </div>

                    <div class="form-group @if ($errors->get('emailclient')) has-error @endif">
                        <label for="emailclient" >Email :</label>
                        <input type="text" name="emailclient" id="emailclient" class="form-control "
                            value="{{ old('emailclient') }}">
                    </div>

                    <div class="form-group @if ($errors->get('password')) has-error @endif">
                        <label for="password" >Mot de passe :</label>
                        <input type="text" name="password" id="password" class="form-control "
                            value="{{ old('password') }}">
                    </div>

                    <div class="form-group @if ($errors->get('confirmpassword')) has-error @endif">
                        <label for="confirmpassword" >Confirmation :</label>
                        <input type="text" name="confirmpassword" id="confirmpassword" class="form-control "
                            value="{{ old('confirmpassword') }}">
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-success form-control" value="Ajouter">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
