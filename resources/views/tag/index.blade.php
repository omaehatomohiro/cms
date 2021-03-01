@extends('layouts.app')

@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="card">
                <div class="card-header">「 {{ $articleType->name }} 」タグ 一覧</div>

                <div class="card-body">
                    <div>
                        <a href="{{ action('TagController@create',$articleType ) }}" class="btn btn-primary">タグ 新規追加</a>
                        <a href="{{ action('PostController@index',$articleType ) }}" class="btn btn-light">戻る</a>
                    </div>
                    @include('tag._list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection