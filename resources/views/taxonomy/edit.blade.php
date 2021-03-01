@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-9 col-lg-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="mt-5">
                        <h2>登録済み</h2>
                        <form action="{{ action('CategoryController@update', $taxonomy ?? '') }}" method="POST">
                            @method('PATCH')
                            @include('taxonomy._form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
