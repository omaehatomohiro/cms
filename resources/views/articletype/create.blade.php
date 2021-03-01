@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-9 col-lg-10">
            <div class="card">

                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <form action="{{ action('ArticleTypeController@store') }}" method="POST">
                        @include('articletype._form')
                    </form>

                    @include('articletype._list')
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
