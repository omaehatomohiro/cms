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
                <div class="card-header">タグ 一覧</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('TagController@create',$articleType ) }}" class="btn btn-primary">タグ 新規追加</a>
                        <a href="{{ action('PostController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    @include('tag._list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
