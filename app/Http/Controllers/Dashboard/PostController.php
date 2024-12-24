<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(2);
        //dd($posts);
        // $category = Category::find(1);

        // $post->update(
        //     [
        //         'title' => 'test title 2'
        //     ]
        // );

        //dd($category->posts[0]->title);
        
        // Post::create(
        //     [
        //         'title' => 'test title',
        //         'slug' => 'test slug',
        //         'content' => 'test content',
        //         'category_id' => 1,
        //         'description' => 'test description',
        //         'posted' => 'no',
        //         'image' => 'test image',
        //     ]
        // );

        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck("title", "id");
        $post = new Post();

        //dd($categories);
        return view('dashboard.post.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //dd($request->all());
        // $validated = Validator::make($request->all(), [
        //         'title' => 'required|min:5|max:500',
        //         'slug' => 'required|min:5|max:500',
        //         'content' => 'required|min:7',
        //         'category_id' => 'required|integer',
        //         'description' => 'required|min:7|max:500',
        //         'posted' => 'required',
        // ]);

        //dd($validated->errors());
        // $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:7|max:500',
        //     'posted' => 'required',
        // ]);

        Post::create($request->validated());
        return to_route("post.index");
        //dd($request->all()['title']);
        // Post::create(
        //         [
        //             'title' => $request->all()['title'],
        //             'slug' => $request->all()['slug'],
        //             'content' => $request->all()['content'],
        //             'category_id' => $request->all()['category_id'],
        //             'description' => $request->all()['description'],
        //             'posted' => $request->all()['posted'],
        //             //'image' => $request->all()['image'],
        //         ]
        //     );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $categories = Category::pluck("title", "id");
        //dd(compact('post'));
        return view('dashboard.post.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck("title", "id");
        //dd(compact('post'));
        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        //dd($request->image);
        if(isset($data['image'])){
            $data['image'] = $filename = time().".".$data['image']->extension();
            $request->image->move(public_path('uploads/posts'), $filename);
        }

        $post->update($data);
        return to_route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index");
    }
}
