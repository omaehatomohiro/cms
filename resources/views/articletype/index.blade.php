@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="text-left pt-4 pb-5">
        <a class="btn btn-primary" href="{{ action('ArticleTypeController@create') }}">記事タイプ追加</a>
    </div>
    <div class="row">
        @forelse($articleTypes as $articleType )
        <div class="col-md">
            <div class="card">
                <div class="card-header">No.{{$articleType->id}}  「{{$articleType->name}}」</div>
                <div class="card-body">
                    <h2>{{$articleType->name}}</h2>
                    <p>{{$articleType->slug}}</p>
                    <p>{{$articleType->description}}</p>
                    <div class="">
                        <a class="btn btn-primary" href="{{ action('PostController@index',$articleType ) }}">
                            「{{$articleType->name}} 」記事一覧へ
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <p>記事タイプ登録なし</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
