@extends('pages.adminUser.index')
@section('maindashboard')
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-md-10">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Ville</th>
                            <th scope="col">créé à</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr class="justify-content-center">
                            <td scope="row">{{$client->id}}</td>
                            <td scope="row">{{$client->nomclient}}</td>
                            <td scope="row">{{$client->prenomclient}}</td>
                            <td scope="row">{{$client->nomville}}</td>
                            <td scope="row">{{$client->created_at}}</td>
                            <td scope="row">
                                <a href="{{url('admin/client/details/'.$client->id)}}" class="btn btn-success">
                                    Details
                                </a>
                                <a href="{{url('admin/client/'.$client->id.'/edit')}}" class="btn btn-warning">
                                    Modifier
                                </a>
                                <form class="d-inline" action="{{url('admin/client/'.$client->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
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
