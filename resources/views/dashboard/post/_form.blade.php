@csrf
<label for="">Title</label>
<input class='form-control' type="text" name="title" value="{{old("title", $post->title)}}">
<label for="">Slug</label>
<input class='form-control' type="text" name="slug" value="{{old("slug", $post->slug)}}">
<label for="">Content</label>
<textarea class='form-control' name="content">{{old("content", $post->content)}}</textarea>
<label for="">Category</label>
<select class='form-control' name="category_id">
    @foreach ($categories as $id => $value)
        <option value="{{ $id }}" {{(old("category_id", $post->category_id) == $id) ? 'selected' : ''}}>{{ $value }}</option>
    @endforeach
</select>
<label for="">Description</label>
<textarea class='form-control' name="description">{{old("description", $post->description)}}</textarea>
<label for="">Posted</label>
<select class='form-control' name="posted">
    <option value="no" {{(old("posted", $post->posted) == 'no') ? 'selected' : ''}}>No</option>
    <option value="yes" {{(old("posted", $post->posted) == 'yes') ? 'selected' : ''}}>Yes</option>
</select>
@if (isset($task) && $task == 'edit')
<label for="">Image</label>
<input class='form-control' type="file" name="image">    
@endif

<input type="submit" class='btn btn-success' value="Send">