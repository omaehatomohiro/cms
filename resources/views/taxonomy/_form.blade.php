@csrf

<div class="form-group">
  <label for="exampleInputEmail1">名前 name</label>
  <input type="text" name="name" class="form-control" value="{{ old('name',isset($taxonomy) ? $taxonomy->name : '') }}" 
    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="">スラッグ slug</label>
  <input type="text" name="slug" class="form-control" value="{{ old('slug',isset($taxonomy) ? $taxonomy->slug : '') }}" 
    id="" placeholder="">
</div>

<div class="form-group">
  <label for="">説明 description</label>
  <textarea name="description" class="form-control"
      id="" placeholder="">{{ old('description',isset($taxonomy) ? $taxonomy->description : '') }}</textarea>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>