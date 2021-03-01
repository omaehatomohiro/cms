@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-12">
            <div class="card">
                <div class="card-header"><span class="h4 font-weight-bold">{{$articleType->name}}</span>の新規投稿</div>
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