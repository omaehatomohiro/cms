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
                <div class="card-header">タグ 編集</div>

                <div class="card-body">

                    <div class="mt-5">
                        <h4 class="mb-3">登録済み</h4>
                        <form action="{{ action('TagController@update', [$articleType,$tag]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('tag._form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
