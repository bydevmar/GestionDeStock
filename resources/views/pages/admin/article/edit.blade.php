@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6  ">
                <h2 class="h2 pb-4">Modifier un Article</h2>
                <form class="form" method="POST" action="{{ url('admin/articles/' . $article->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group @if ($errors->get('nomarticle')) has-error @endif">
                        <label for="nomarticle" class="mb-1">Nom :</label>
                        <input type="text" id="nomarticle" name="nomarticle" class="form-control mb-4 "
                            value="{{ $article->nomarticle }}">

                        @if ($errors->get('nomarticle'))
                            @foreach ($errors->get('nomarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group @if ($errors->get('descriptionarticle')) has-error @endif">
                        <label for="descriptionarticle" class="mb-1">Description :</label>
                        <textarea name="descriptionarticle" id="descriptionarticle"
                            class="form-control mb-4">{{ $article->descriptionarticle }}</textarea>

                        @if ($errors->get('descriptionarticle'))
                            @foreach ($errors->get('descriptionarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif

                    </div>

                    <div class="form-group  @if ($errors->get('prixarticle')) has-error @endif">
                        <label for="prixarticle" class="mb-1">Prix :</label>
                        <input type="number" name="prixarticle" id="prixarticle" class="form-control mb-4"
                            value="{{ $article->prixarticle }}">

                        @if ($errors->get('prixarticle'))
                            @foreach ($errors->get('prixarticle') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        @endif

                    </div>

                    <div class="">
                        <label for="imagearticle" class="mb-1">Photo d'article:</label>
                        <div class="card-fluid">
                            <img id="uploadPreview" src="{{ asset('storage/photos/' . $article->imagearticle) }}"
                                class="form-control img-thumbnail w-25  h-25" alt="Responsive image">
                            <input type="file" name="imagearticle" onchange="PreviewImage();" id="imagearticle" class="mb-4"
                                aria-valuetext="{{ $article->imagearticle }}">
                        </div>

                        <script type="text/javascript">
                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("imagearticle").files[0]);

                                oFReader.onload = function(oFREvent) {
                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                };
                            };

                        </script>
                    </div>

                    <div class="form-group ">
                        <label for="imagearticle" class="mb-1">Categorie:</label>
                        <select class="form-control mb-3" aria-label="Categorie" name="categories">
                            <option selected value="">Selectionner Categorie</option>
                            @foreach ($categories as $categorie)
                                @if ($categorie->id == $article->categorie_id)
                                    <option value="{{ $categorie->id }}" selected>{{ $categorie->nomcategorie }}
                                    </option>
                                @else
                                    <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-danger" value="MOFIDIER">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
