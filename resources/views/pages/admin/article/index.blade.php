@extends('pages.admin.dashboard.index')
@section('maindashboard')
    <div class="container">
        <h1>Liste des articles</h1>
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <a class="btn btn-success" href="{{ url('admin/articles/create') }}">Cree un article</a>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="card mt-3 mr-3" style="width: 18rem;">
                            <img src="{{ asset('storage/photos/' . $article->imagearticle) }}"
                                class="card-img-top  w-80  h-50" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->nomarticle }}</h5>
                                <p class="card-text">{{ $article->descriptionarticle }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="" class="form-control btn btn-success">
                                        Details
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('admin/articles/' . $article->id . '/edit') }}"
                                        class="form-control btn btn-warning">
                                        Modifier
                                    </a>

                                </li>
                                <li class="list-group-item">
                                    <form action="{{ url('admin/articles/' . $article->id . '') }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="form-control btn btn-danger">Supprimer</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
