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
        @include('layouts.menu')
        <div class="col-12">
            <div class="card">
    

                <div class="card-body">
                    <div>
                        <a href="{{ action('PostController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    <div class="mt-5">
                        <h4 class="mb-3">新規追加</h4>
                        <form action="{{ action('TagController@store', $articleType) }}" method="POST">
                            @csrf
                            @include('tag._form')
                        </form>
                    </div>
                </div>
            </div>

            @include('tag._list')
        </div>
    </div>
</div>
@endsection
