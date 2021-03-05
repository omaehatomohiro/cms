@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
<div class="container-fluid">

<div class="col-12">

</div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">「 {{$articleType->name}} 」記事一覧</div>
                <div class="card-body">
                    <div class="mt-3 mb-5">
                    <a class="btn btn-primary" href="{{ action('PostController@create',$articleType)}}">新規 {{$articleType->name}} 記事投稿</a>
                    </div>
                    <ul class="list-group">
                        @forelse($posts as $post)
                        <li class="list-group-item">
                            
                            <h4 class="font-weight-bold">タイトル：{{ $post->post_title }}</h4>
                           
                            @if( isset($post->category) )
                            <div class="pt-4">
                                <h5>カテゴリー名</h5>
                                <a class="btn btn-success" href="{{ action('CategoryController@index',[$articleType, $post->category]) }}">{{$post->category->name}}</a>
                            </div>
                            @endif

                            @if( isset($post->tags) )
                            <div class="pt-4">
                                <h5>タグ</h5>
                                @forelse($post->tags as $tag )
                                <a class="btn btn-warning" href="{{ action('TagController@index',[$articleType,$tag]) }}">{{ $tag->name }}</a>
                                @empty
                                なし
                                @endforelse
                            </div>
                            @endif

                            <a class="btn btn-success" href="{{ action('PostController@edit',[$articleType, $post]) }}">編集</a>

                            <div class="mt-4">
                              {!! html_entity_decode($post->post_content,ENT_QUOTES, 'UTF-8') !!}
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">投稿なし</li>
                        @endforelse
                    </ul>

                </div>
            </div>

    </div>
</div>
@endsection
