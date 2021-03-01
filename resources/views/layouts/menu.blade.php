
<div class="col-12">
   
    @if(request()->path() == "/")
    <div class="text-center">
        <a class="btn btn-primary" href="{{ action('ArticleTypeController@create') }}">記事タイプ追加</a>
    </div>
    @else

    @endif
   
</div>
