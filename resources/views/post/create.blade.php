@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-9 col-md-9">
            <div class="card">
                <div class="card-header"><span class="h4 font-weight-bold">{{$articleType->name}}</span> の新規投稿</div>
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