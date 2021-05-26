@extends('pages.adminUser.index')
@section('maindashboard')
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-md-10">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$client->id}}</td>
                            <td>{{$client->nomclient}}</td>
                            <td>{{$client->prenomclient}}</td>
                            <td>{{$client->ville_id}}</td>
                            <td>
                                <button class="btn btn-success">Details</button>
                                <button class="btn btn-warning">Modifier</button>
                                <button class="btn btn-danger">Supprimer</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
