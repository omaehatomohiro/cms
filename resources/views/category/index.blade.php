@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="card">
                <div class="card-header">「 {{ $articleType->name }} 」カテゴリー 一覧</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('CategoryController@create',$articleType ) }}" class="btn btn-primary">カテゴリー 新規追加</a>
                        <a href="{{ action('PostController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    @include('category._list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
