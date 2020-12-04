<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StorePost;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_deleted', 0)->latest()->get();
        return view('back.pages.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View;
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.pages.post.create', compact('categories', $categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePost $request)
    {
        $post = $request->validated();
        $post['user_id'] = auth()->user()->id;
        if(!strpos($post['slug'], '-')){
            $slug = implode('-', explode(' ',$post['slug']));
            $post['slug'] = $slug;
        }

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $path = $image->storeAs('public/coverimages', $filename);
            $post['cover_image'] = $filename;
        }

        if($request->hasFile('thumbnail_image')){
                $image = $request->file('thumbnail_image');

                $filename = time().'.'.$image->getClientOriginalExtension();

                $path = $image->storeAs('public/thumbnail_images', $filename);
                $post['thumbnail_image'] = $filename;
        }
        Post::create($post);

        return redirect('/admin/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('back.pages.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, Post $post)
    {
        $data = $request->validated();
        if(!strpos($data['slug'], '-')){
            $slug = implode('-', explode(' ', $data['slug']));
            $data['slug'] = $slug;
        }

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/coverimages', $filename);
            $data['cover_image'] = $filename;
        }

        if($request->hasFile('thumbnail_image')){

            $image = $request->file('thumbnail_image');
            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/thumbnail_images', $filename);
            $data['thumbnail_image'] = $filename;
        }

        $post->update($data);


        return redirect('/admin/posts')->with('success', 'Post created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->where('id', $post->id)->update(['is_deleted'=>1]);
        return redirect()->route('posts.index')->with('success', 'Product deleted');
    }

    public function restore_post(Request $request){
        Post::where('id', $request->get('post_id'))->update(['is_deleted'=>0]);
        return redirect()->route('posts.deleted_posts')->with('success', 'Post has been restored');
    }

    public function restore_all(){
        Post::where('user_id', Auth::user()->id)->update(['is_deleted'=>0]);
        return redirect()->route('posts.deleted_posts')->with('success', 'All post has been restored. See all posts');
    }

    public function show_deleted_posts(){
        $posts = Post::where('is_deleted', 1)->get();
        return view('back.pages.post.deleted_posts', compact('posts'));
    }
}
