@csrf
<label for="">Title</label>
<input type="text" class="form-control" name="title" value="{{old("title", $category->title)}}">
<label for="">Slug</label>
<input type="text" class="form-control" name="slug" value="{{old("slug", $category->slug)}}">

<input type="submit" class='btn btn-success' value="Send">