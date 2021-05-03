@extends('layouts.master')

@section('content')
    @if (count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>
                        {{$message}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-2" >
        <div class="row">
            <div class="col-md-12 ">
                <h1>Creation d'un Article</h1>
                <form method="POST" action="{{url('/articles')}}" enctype="multipart/form-data">
                    @csrf

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
                        <label for="imagearticle" class="mb-1">Photo d'article:</label>
                        <input type="file" name="imagearticle" id="imagearticle" class="form-control mb-4" >
                    </div>

                    <div class="form-group ">
                        <select class="form-select mb-3" aria-label="Categorie" name="categories">
                            <option selected value="">Selectionner Categorie</option>
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