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
        @include('layouts.menu')
        <div class="col-12">
            <div class="card">
                <div class="card-header">カテゴリー</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('CategoryController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-3">編集</h4>
                        <form action="{{ action('CategoryController@update',[$articleType,$category] ) }}" method="POST">
                            @method('PATCH')
                            @include('category._form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
