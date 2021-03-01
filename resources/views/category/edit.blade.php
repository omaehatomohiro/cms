@extends('layouts.app')

@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-12 col-lg-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('CategoryController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    <div class="mt-5">
                        <h3 class="mb-3">編集</h3>
                        <form action="{{ action('CategoryController@update',[$articleType,$category] ) }}" method="POST">
                            @method('PATCH')
                            @include('category._form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
