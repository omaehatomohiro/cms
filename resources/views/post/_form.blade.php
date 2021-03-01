

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="">カテゴリー</label>
    </div>

    @if( isset($categories[0]) )
    <select name="category_id" class="custom-select custom-select-lg">
    {!! category_options($categories,$post ?? null) !!}
    </select>
    @else
        <!-- <p>カテゴリー登録なし</p> -->
        <a class="btn btn-primary" href="{{ action('CategoryController@create', $articleType) }}">カテゴリ新規追加</a>
    @endif
</div>


<div class="input-group my-4">
    @if( isset($tags[0]) )
        {!! tag_checks($tags,$post ?? null) !!}
    @else
        <div>タグ登録なし　<a class="btn btn-primary" href="{{ action('TagController@create', $articleType) }}">タグ新規追加</a></div>
    @endif
</div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="post_thumbnail" aria-describedby="inputGroupFileAddon01" name="post_thumbnail">
    <label class="custom-file-label" for="post_thumbnail">Choose file</label>
  </div>
</div>

<div class="form-group">
    <label for="author_id">作者</label>
    <input type="text" name="author_id" 
        class="form-control"
        id="author_id"
        value="{{ old('author_id',isset($post) ? $post->author_id : '') }}"
        placeholder="">
</div>


<div class="form-group">
    <label for="post_slug">スラッグ</label>
    <input type="text" name="post_slug" 
        class="form-control"
        id="post_slug"
        value="{{ old('post_slug',isset($post) ? $post->post_slug : '') }}"
        placeholder="">
    <small class="form-text text-danger">{{$errors->first('post_slug')}}</small>
</div>


<div class="form-group">
    <label for="post_description">ディスクリプション</label>
    <input type="text" name="post_description" 
        class="form-control" 
        id="post_description"
        value="{{ old('post_description',isset($post) ? $post->post_description : '') }}"
        placeholder="">
    <small class="form-text text-danger">{{$errors->first('post_description')}}</small>
</div>


<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="">状態</label>
    </div>
    <select name="post_status" class="custom-select custom-select-lg">
        {!! status_options(isset($post) ? $post->post_status : 0 ) !!}
    </select>
</div>


<div class="form-group">
    <label for="post_title">タイトル</label>
    <input type="text" name="post_title" 
        value="{{ old('post_title',isset($post) ? $post->post_title : '') }}" 
        class="form-control" id="post_title" placeholder="">
    <small class="form-text text-danger">{{$errors->first('post_title')}}</small>
</div>


<div class="form-group">
    <label for="post_text">本文</label>
    <input type="hidden" name="post_content">
    <div id="editor">
        {!! old('post_content',isset($post) ?? '') !!}
    </div>
</div>
<small class="form-text text-danger">{{$errors->first('post_content')}}</small>


<div class="mt-3">
    <button id="save-post" class="btn btn-primary" type="submit">登録</button>
</div>
