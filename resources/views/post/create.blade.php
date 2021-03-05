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
        @include('layouts.menu')
        <div class="col-12">
            <div class="card">
                <div class="card-header">新規投稿</div>
                <div class="card-body">
                    
                    <form id="post-form" action="{{ action('PostController@store',$articleType) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('post._form')
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection