@extends('adminlte::page')
 
<!-- タイトル -->
@section('title', 'Dashboard')

<!-- 見出し -->
@section('content_header')
    <h3 class="mt-3 ml-3">{{$articleType->name}} Dashboard</h3>
@stop


@section('content')
<div class="container-fluid">

<div class="col-12">

</div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">投稿一覧</div>
                <div class="card-body">
                    <div class="mt-3 mb-5">
                        <a class="btn btn-primary" href="{{ action('PostController@create',$articleType)}}">新規 {{$articleType->name}} 記事投稿</a>
                    </div>


                    <ul class="list-group">
          
                        @include('post._list')
     
                    </ul>

                </div>
            </div>

    </div>
</div>
@endsection
