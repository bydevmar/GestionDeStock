@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Modifier une commande</h2>

                <form method="POST" action="{{ url('admin/commandes/' . $commande->id) }}" enctype="multipart/form-data"
                    class="form">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group ">
                        <label for="client">Client :</label><br>
                        <select class="form-control mb-3" aria-label="client" name="client">
                            <option selected value="">Selectionner un Client</option>
                            @foreach ($clients as $client)
                                @if ($client->id == $commande->client_id)
                                    <option value="{{ $client->id }}" selected>
                                        {{ $client->nomclient . ' ' . $client->prenomclient }}
                                    </option>
                                @else
                                    <option value="{{ $client->id }}">
                                        {{ $client->nomclient . ' ' . $client->prenomclient }}
                                    </option>
                                @endif
                            @endforeach
                            @if ($errors->get('datecommande'))
                                @foreach ($errors->get('datecommande') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="datecommande">Date Commande:</label>
                        <input type="date" id="datecommande" name="datecommande" class="form-control"
                            value="{{ $client->datecommande }}">
                        @if ($errors->get('datecommande'))
                            @foreach ($errors->get('datecommande') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="client">Etat de Commande :</label><br>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="Annulee" value="Annulee" @if ($commande->etatcommande == 'Annulee') checked @endif>
                            <label for="Annulee">Annulee</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="Livree" value="Livree" @if ($commande->etatcommande == 'Livree') checked @endif>
                            <label for="Livree">Livree</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="En_Attente" value="En_Attente" @if ($commande->etatcommande == 'En_Attente') checked @endif>
                            <label for="En_Attente">En_Attente</label>
                        </div>
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-warning form-control" value="Modifier">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
