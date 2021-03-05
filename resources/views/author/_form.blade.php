<div class="form-group">
  <label for="exampleInputEmail1">名前 name</label>
  <input type="text" name="name" class="form-control" value="{{ old('name',isset($author) ? $author->name : '') }}" 
    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  <small class="form-text text-danger">{{$errors->first('name')}}</small>
</div>

<div class="form-group">
  <label for="">スラッグ slug</label>
  <input type="text" name="slug" class="form-control" value="{{ old('slug',isset($author) ? $author->slug : '') }}" 
    id="" placeholder="">
    <small class="form-text text-danger">{{$errors->first('slug')}}</small>
</div>

<div class="form-group">
  <label for="">説明 description</label>
  <textarea name="description" class="form-control"
      id="" placeholder="">{{ old('description',isset($author) ? $author->description : '') }}</textarea>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>