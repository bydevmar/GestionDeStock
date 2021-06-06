@extends('layouts.master')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 ">
                <h1>Creation d'un Article</h1>
                <form method="POST" action="{{ url('admin/articles') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group  @if ($errors->get('nomarticle')) has-error @endif">
                        <label for="nomarticle" class="mb-1">Nom :</label>
                        <input type="text" id="nomarticle" name="nomarticle" class="form-control mb-4"
                            value="{{ old('nomarticle') }}">

                        @if ($errors->get('nomarticle'))
                            @foreach ($errors->get('nomarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if ($errors->get('descriptionarticle')) has-error @endif">
                        <label for="descriptionarticle" class="mb-1">Description :</label>
                        <textarea name="descriptionarticle" id="descriptionarticle"
                            class="form-control mb-4">{{ old('descriptionarticle') }}</textarea>
                        @if ($errors->get('descriptionarticle'))
                            @foreach ($errors->get('descriptionarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if ($errors->get('prixarticle')) has-error @endif">
                        <label for="prixarticle" class="mb-1">Prix :</label>
                        <input type="number" name="prixarticle" id="prixarticle" class="form-control mb-4"
                            value="{{ old('prixarticle') }}">

                        @if ($errors->get('prixarticle'))
                            @foreach ($errors->get('prixarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif

                    </div>

                    <div class="form-group ">
                        <label for="imagearticle" class="mb-1">Photo d'article:</label>
                        <input type="file" name="imagearticle" id="imagearticle" class="form-control mb-4">
                    </div>

                    <div class="form-group ">
                        <select class="form-select mb-3" aria-label="Categorie" name="categories">
                            <option selected value="">Selectionner Categorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
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
