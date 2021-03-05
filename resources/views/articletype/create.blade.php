@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h3 class="mt-3 ml-3">Dashboard</h3>
@stop



@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-12">
            <div class="card">

                <div class="card-header">記事タイプ 追加</div>

                <div class="card-body">

                    <form action="{{ action('ArticleTypeController@store') }}" method="POST">
                        @include('articletype._form')
                    </form>

                    @include('articletype._list')
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
