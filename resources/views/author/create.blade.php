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
        <div class="col-12">
            <div class="card">
                <div class="card-header">投稿者 追加</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('AuthorController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    <div class="mt-5">
                        <h3 class="mb-3">新規追加</h3>
                        <form action="{{ action('AuthorController@store',$articleType) }}" method="POST">
                            @csrf
                            @include('author._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
