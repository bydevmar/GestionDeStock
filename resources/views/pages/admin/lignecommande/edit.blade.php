@extends('pages.admin.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Modifier une ligne commande</h2>

                <form method="POST" action="{{ url('admin/lignecommandes/' . $lignecommande->commande_id."/".$lignecommande->article_id) }}" enctype="multipart/form-data"
                    class="form">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group ">
                        <label for="commande">Commande :</label><br>
                        <select class="form-control mb-3" aria-label="commande" name="commande">
                            <option selected value="">Selectionner une commande</option>
                            @foreach ($commandes as $commande)
                                @if ($commande->id == $lignecommande->commande_id)
                                    <option value="{{ $commande->id }}" selected>
                                        {{ 'ID: ' . $commande->id . ' - Date Commande: ' . date('d-m-Y', strtotime($commande->datecommande)) . ' - Etat: ' . $commande->etatcommande  }}
                                    </option>
                                @else
                                    <option value="{{ $commande->id }}">
                                        {{ 'ID: ' . $commande->id . ' - Date Commande: ' . date('d-m-Y', strtotime($commande->datecommande)) . ' - Etat: ' . $commande->etatcommande  }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="article">Article :</label><br>
                        <select class="form-control mb-3" aria-label="article" name="article">
                            <option selected value="">Selectionner un Article</option>
                            @foreach ($articles as $article)
                                @if ($article->id == $lignecommande->article_id)
                                    <option value="{{ $article->id }}" selected>
                                        {{ 'ID: ' . $article->id . ' -Nom: ' .$article->nomarticle . ' - Prix: ' . $article->prixarticle  }}
                                    </option>
                                @else
                                    <option value="{{ $commande->id }}">
                                        {{ 'ID: ' . $article->id . ' -Nom: ' .$article->nomarticle . ' - Prix: ' . $article->prixarticle  }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="article">Article :</label><br>
                        <input class="form-control" type="number" name="quantite" id="quantite" min="0" max="1000" value="{{$lignecommande->quantite}}">
                    </div>

                    <div class="form-group justify-content-center">
                        <input type="submit" class="btn btn-warning form-control" value="Modifier">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
