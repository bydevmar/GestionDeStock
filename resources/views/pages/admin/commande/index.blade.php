@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-md-10">
                <a href="{{ url('admin/commandes/create') }}" class="btn btn-primary">Ajouter une Commande</a>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client</th>
                            <th scope="col">Date Commande</th>
                            <th scope="col">Etat Commande</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr class="justify-content-center">
                                <td scope="row">{{ $commande->commande_id }}</td>
                                <td scope="row">{{ $commande->nomclient." ".$commande->prenomclient }}</td>
                                <td scope="row">{{ $commande->datecommande }}</td>
                                <td scope="row">{{ $commande->etatcommande }}</td>
                                <td scope="row">
                                    <a href="{{ url('admin/commandes/' . $commande->commande_id . '/edit') }}" class="form-control btn btn-warning">
                                        Modifier
                                    </a>
                                    <form action="{{ url('admin/commandes/' . $commande->commande_id . '') }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="form-control btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
