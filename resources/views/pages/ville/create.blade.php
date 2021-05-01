@extends('layouts.master')

@section('content')
    <div class="container mt-2" >
        <div class="row">
            <div class="col-md-12 ">
                <h1>Creation d'un Article</h1>
                <form method="POST" action="{{url('/articles')}}">
                    {{ csrf_field() }}
                    <div class="form-group >
                        <label for="nomarticle" class="mb-1">Nom :</label>
                        <input type="text" id="nomarticle" name="nomarticle" class="form-control mb-4 " value="">                        
                    </div>

                    <div class="form-group ">
                        <label for="descriptionarticle" class="mb-1" >Description :</label>
                        <textarea  name="descriptionarticle" id="descriptionarticle" class="form-control mb-4"></textarea>
                    </div>

                    <div class="form-group ">
                        <label for="prixarticle" class="mb-1">Prix :</label>
                        <input type="number" name="prixarticle" id="prixarticle" class="form-control mb-4" >
                    </div>

                    <div class="form-group ">
                        <label for="imagearticle" class="mb-1">Photo :</label>
                        <input type="file" name="imagearticle" id="imagearticle" class="form-control mb-4" >
                    </div>

                    <div class="form-group ">
                        <select class="form-select mb-3" aria-label="Categorie" name="categories">
                            <option selected>Selectionner Categorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}">{{ $categorie->nomcategorie }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    

                    

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregistrer">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection