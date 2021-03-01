@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-9 col-lg-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="my-3">記事タイプ</h3>
                    <ul class="list-group">
                        @foreach($articleTypes as $articleType)
                            <li class="list-group-item">
                                <a href="{{ action('PostController@index',$articleType) }}">{{$articleType->name}}の記事一覧</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
