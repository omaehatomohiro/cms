@extends('layouts.app')

@section('content')
<div class="container">

<div class="col-12">

</div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">「 {{$articleType->name}} 」記事一覧</div>
                <div class="card-body">
                    <div class="mt-3 mb-5">
                        <a class="btn btn-primary" href="{{ action('PostController@create',$articleType)}}">新規 {{$articleType->name}} 記事投稿</a>
                        <a class="btn btn-primary" href="{{ action('CategoryController@create',$articleType)}}">新規カテゴリー追加</a>
                        <a class="btn btn-primary" href="{{ action('TagController@create',$articleType)}}">新規タグ追加</a>
                    </div>

                    <div class="mt-3 mb-5">
                        <a class="btn btn-primary" href="{{ action('CategoryController@index',$articleType)}}">カテゴリ一覧</a>
                        <a class="btn btn-primary" href="{{ action('TagController@index',$articleType)}}">タグ一覧</a>
                    </div>


                    <ul class="list-group">
          
                        @include('post._list')
     
                    </ul>

                </div>
            </div>

    </div>
</div>
@endsection
