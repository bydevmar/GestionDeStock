@extends('pages.admin.index')
@section('maindashboard')
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-md-10">
                <a href="{{ url('admin/lignecommandes/create') }}" class="btn btn-primary">Ajouter une ligne de commande</a>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Commande ID</th>
                            <th scope="col">Article</th>
                            <th scope="col">Client</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Etat de commande</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lignecommandes as $lc)
                            <tr class="justify-content-center">
                                <td scope="row">{{ $lc->commande_id }}</td>
                                <td scope="row">{{ $lc->nomarticle }}</td>
                                <td scope="row">{{ $lc->nomclient." ".$lc->prenomclient }}</td>
                                <td scope="row">{{ $lc->quantite }}</td>
                                <td scope="row">{{ $lc->etatcommande }}</td>
                                <td scope="row">
                                    <a href="{{ url("admin/lignecommandes/".$lc->commande_id."/". $lc->article_id."/edit") }}" class="form-control btn btn-warning">
                                        Modifier
                                    </a>
                                    <form action="{{ url('admin/lignecommandes/' . $lc->commande_id ) }}" method="post">
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
