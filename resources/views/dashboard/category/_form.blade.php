@csrf
<label for="">Title</label>
<input type="text" name="title" value="{{old("title", $category->title)}}">
<label for="">Slug</label>
<input type="text" name="slug" value="{{old("slug", $category->slug)}}">

<input type="submit" value="Send">