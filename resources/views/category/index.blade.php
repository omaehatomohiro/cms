@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h3 class="mt-3 ml-3">{{$articleType->name}} Dashboard</h3>
@stop


@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">カテゴリー</div>

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
