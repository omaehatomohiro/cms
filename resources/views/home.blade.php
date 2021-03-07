@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (Auth::check())
                        <p class="mb-0">You are logged in!</p>
                    @else
                    <p>ニュース</p>
                    <div class="">
                        <a class="btn btn-primary" href="http://127.0.0.1:8000/articletype/1/posts">
                            「ニュース 」記事一覧へ
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
