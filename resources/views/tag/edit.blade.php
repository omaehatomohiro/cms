@extends('layouts.app')

@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-12 col-lg-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="mt-5">
                        <h2>登録済み</h2>
                        <form action="{{ action('TagController@update', [$articleType,$tag]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('tag._form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
