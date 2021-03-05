@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h3 class="mt-3 ml-3">Dashboard</h3>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        @forelse($articleTypes as $articleType )
        <div class="col-12">
            <div class="card">
                <div class="card-header">記事タイプ 一覧</div>
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
