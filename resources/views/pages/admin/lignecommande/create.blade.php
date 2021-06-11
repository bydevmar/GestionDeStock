@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Ajouter une Ligne de commandes</h2>

                <form method="POST" action="{{ url('/admin/lignecommandes') }}" enctype="multipart/form-data"
                    class="form mt-4">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <label for="commande">Commande :</label><br>
                        <select class="form-control mb-3" aria-label="commande" name="commande">
                            <option selected value="">Selectionner une Commande</option>
                            @foreach ($commandes as $commande)
                                <option value="{{ $commande->id }}">
                                    {{ 'ID: ' . $commande->id . ' - Date Commande: ' . date('d-m-Y', strtotime($commande->datecommande)) . ' - Etat: ' . $commande->etatcommande }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="article">Article :</label><br>
                        <select class="form-control mb-3" aria-label="article" name="article">
                            <option selected value="">Selectionner un Article</option>
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}">
                                    {{ 'ID: ' . $article->id . ' - Nom: ' . $article->nomarticle }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="quantite">Quantite:</label>
                        <input class="form-control" type="number" id="quantite" name="quantite" min='0' max='1000'
                            value="{{ old('quantite') }}">
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-success form-control" value="Ajouter">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
