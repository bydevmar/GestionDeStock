@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>Liste des articles</h1>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{url('/articles/create')}}">Cree un article</a>
                </div>
                
                <div class="row">
                    
                
                @foreach ($articles as $article)
                <div class="card mt-3" style="width: 18rem;">
                    <img src="{{asset("storage/photos/".$article->imagearticle)}}" class="card-img-top  w-80  h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->nomarticle}}</h5>
                        <p class="card-text">{{$article->descriptionarticle}}</p>
                    </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="" class="form-control btn btn-success">
                                    Details
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('articles/'.$article->id.'/edit')}}" class="form-control btn btn-warning">
                                    Modifier
                                </a>
                                
                            </li>
                            <li class="list-group-item">
                                <form action="{{url('articles/'.$article->id.'')}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    
                                    <button type="submit" class="form-control btn btn-danger" >Supprimer</button>
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