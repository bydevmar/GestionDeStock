@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Ajouter un Client</h2>

                <form method="POST" action="{{ url('/admin/clients') }}" enctype="multipart/form-data" class="form mt-4">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <label for="nomclient">Nom :</label>
                        <input type="text" id="nomclient" name="nomclient" class="form-control "
                            value="{{ old('nomclient') }}">
                        @if ($errors->get('nomclient'))
                            @foreach ($errors->get('nomclient') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group ">
                        <label for="prenomclient">Prenom :</label>
                        <input type="text" id="prenomclient" name="prenomclient" class="form-control"
                            value="{{ old('prenomclient') }}">
                        @if ($errors->get('prenomclient'))
                            @foreach ($errors->get('prenomclient') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group ">
                        <label for="villes">Ville :</label><br>
                        <select class="form-control mb-3" aria-label="villes" name="villes">
                            <option selected value="">Selectionner ville</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nomville }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telephoneclient">Telephone :</label>
                        <input type="text" name="telephoneclient" id="telephoneclient" class="form-control "
                            value="{{ old('telephoneclient') }}">
                        @if ($errors->get('telephoneclient'))
                            @foreach ($errors->get('telephoneclient') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group ">
                        <label for="adresseclient">Adresse :</label>
                        <input type="text" name="adresseclient" id="adresseclient" class="form-control "
                            value="{{ old('adresseclient') }}">
                        @if ($errors->get('adresseclient'))
                            @foreach ($errors->get('adresseclient') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="emailclient">Email :</label>
                        <input type="text" name="emailclient" id="emailclient" class="form-control "
                            value="{{ old('emailclient') }}">
                        @if ($errors->get('emailclient'))
                            @foreach ($errors->get('emailclient') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" class="form-control "
                            value="{{ old('password') }}">
                        @if ($errors->get('password'))
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="confirmpassword">Confirmation :</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control "
                            value="{{ old('confirmpassword') }}">
                        @if ($errors->get('confirmpassword'))
                            @foreach ($errors->get('confirmpassword') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-success form-control" value="Ajouter">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
