@extends('layouts.app')

@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-12 col-lg-10">
            <div class="card">
                <div class="card-header">タグ追加</div>

                <div class="card-body">

                    <form action="{{ action('TagController@store', $articleType) }}" method="POST">
                        @csrf
                        @include('tag._form')
                    </form>

                </div>
            </div>

            @include('tag._list')
        </div>
    </div>
</div>
@endsection
