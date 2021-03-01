
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">記事タイプ</label>
  </div>
</div>


<div class="form-group">
  <label for="exampleInputEmail1">名前 name</label>
  <input type="text" name="name" class="form-control" value="{{ old('name',isset($tag) ? $tag->name : '') }}" 
    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="">スラッグ slug</label>
  <input type="text" name="slug" class="form-control" value="{{ old('slug',isset($tag) ? $tag->slug : '') }}" 
    id="" placeholder="">
</div>

<button type="submit" class="btn btn-primary">Submit</button>