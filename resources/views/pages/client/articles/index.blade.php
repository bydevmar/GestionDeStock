@extends('pages.client.dashboard.index')
@section('maindashboard')
    <div class="container" id="app">
        <h1 class="h1">Articles</h1>
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
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
                                <span class="form-control btn btn-primary">
                                    {{$article->prixarticle}}DH
                                </span>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="" class="form-control btn btn-success">
                                    Details
                                </a>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input class="form-control mt-1" type="number" name="quantitearticle" value="1" min="1" max="100">
                                    </div>
                                    <div class="col-md-7">
                                        <a href="" class="form-control btn btn-success">
                                            Commander
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
