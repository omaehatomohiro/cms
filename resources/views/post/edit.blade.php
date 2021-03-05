@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">投稿 編集</div>
                <div class="card-body">
                    
                    <form id="post-form" action="{{ action('PostController@update',[ $articleType, $post]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        @include('post._form')
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection