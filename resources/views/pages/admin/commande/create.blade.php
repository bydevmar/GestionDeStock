@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Ajouter une Commande</h2>

                <form method="POST" action="{{ url('/admin/commandes') }}" enctype="multipart/form-data"
                    class="form mt-4">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <label for="client">Client :</label><br>
                        <select class="form-control mb-3" aria-label="client" name="client">
                            <option selected value="">Selectionner un Client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nomclient . ' ' . $client->prenomclient }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group ">
                        <label for="datecommande">Date Commande:</label>
                        <input type="date" id="datecommande" name="datecommande" class="form-control "
                            value="{{ old('datecommande') }}"
                            >
                    </div>
                    <script> document.getElementById('datecommande').valueAsDate = new Date();</script>

                    <div class="form-group">
                        <label for="client">Etat de Commande :</label><br>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="Annulee" value="Annulee">
                            <label for="Annulee">Annulee</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="Livree" value="Livree">
                            <label for="Livree">Livree</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="etatcommande" id="En_Attente" value="En_Attente" checked>
                            <label for="En_Attente">En_Attente</label>
                        </div>
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-success form-control" value="Ajouter">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
