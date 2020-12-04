<?php

namespace App\Http\Controllers\V2\Admin;

use App\Helpers\ActionHelper;
use App\Http\Controllers\Controller;
use App\Models\V2\Locale;
use App\Models\V2\Posts\Post;
use App\Http\Requests\V2\Admin\Posts\StorePostRequest;
use App\Models\V2\Posts\PostTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    use ActionHelper;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::where('status','!=',Post::ARCHIVED)->paginate(10);

        return view('back.V2.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function archive(){
        $posts = Post::where('status', Post::ARCHIVED)->paginate(10);

        return view('back.V2.posts.index', [
            'posts' => $posts
        ]);
    }

    public function editorPosts(){
        $field = Route::currentRouteName();

        $title = __('nav.'.$field.'Posts');

        $editorPosts = Post::where($field, true)->paginate(10);
        $posts = Post::all();

        return view('back.V2.posts.editor_posts', [
            'posts' => $posts,
            'editorPosts' => $editorPosts,
            'title' => $title,
        ]);
    }

    public function create(){
        $post_formats = [
            Post::STANDARD_FORMAT => 'Standart',
            Post::AUDIO_FORMAT => 'Audio',
            Post::VIDEO_FORMAT => 'Video',
            Post::GALLERY_FORMAT => 'Galereya',
        ];

        return view('back.V2.posts.post', compact('post_formats'));
    }

    public function store(StorePostRequest $request){
        $data = $request->except([
            '_token',
            'cover',
            'thumbnail_image',
            'carousel_banner_image',
            'carousel_small_image',
            'title',
            'body',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);
        $data['user_id'] = auth()->user()->id;

        $cover = $request->file('cover');
        $thumbnail = $request->file('thumbnail_image');
        $carousel_banner = $request->file('carousel_banner_image');
        $carousel_small = $request->file('carousel_small_image');


        $cover = isset($cover) ? $this->uploadImage($cover, Post::COVER_PATH) : null;
        $thumbnail = isset($thumbnail) ? $this->uploadImage($thumbnail, Post::THUMBNAIL_PATH) : null;
        $carousel_banner = isset($carousel_banner) ? $this->uploadImage($carousel_banner, Post::CAROUSEL_BANNER_PATH) : null;
        $carousel_small = isset($carousel_small) ? $this->uploadImage($carousel_small, Post::CAROUSEL_SMALL_PATH) : null;

        if($cover) $data['cover'] = $cover;
        if($thumbnail) $data['thumbnail_image'] = $thumbnail;
        if($carousel_banner) $data['carousel_banner_image'] = $carousel_banner;
        if($carousel_small) $data['carousel_small_image'] = $carousel_small;

        $post = Post::updateOrCreate(['id' => $request->get('post_id')], $data);

        $locale_id = Locale::where('name', app()->getLocale())->first()->id;

        $post->seo()->updateOrCreate(
            ['client_id' => $post->id],
            [
            'locale_id' => $locale_id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        PostTranslation::updateOrCreate(
            ['post_id' => $post->id],
            [
            'post_id' => $post->id,
            'title' => $request->title,
            'body' => $request->body,
            'locale_id' => $locale_id
        ]);

        $message = $request->get('post_id') ? __('messages.postCreate') : __('messages.postUpdate');
        return redirect()->route('manage.posts.all')->with('success', $message);
    }

    public function edit(Post $post){
        $post_formats = [
            Post::STANDARD_FORMAT => 'Standart',
            Post::AUDIO_FORMAT => 'Audio',
            Post::VIDEO_FORMAT => 'Video',
            Post::GALLERY_FORMAT => 'Galereya',
        ];

        return view('back.V2.posts.post', [
            'post' => $post,
            'post_formats' => $post_formats
        ]);
    }

    public function changeStatus(Post $post, Request $request){
        $request->validate([
            'status' => 'required|numeric'
        ]);

        $post->update(['status' => $request->get('status')]);

        return response()->json(
            [
                'message' => 'success',
                'data' => []
            ]
        );
    }

    public function updateType(Post $post, Request $request){
        $request->validate([
            'val' => 'required',
            'type' => 'required'
        ]);

        $countByType = Post::where($request->type, $request->val)->count();


        $limit = $request->type == 'editor' ? Post::EDITOR_LIMIT : Post::BANNER_LIMIT;

        if($countByType < $limit){
            $post->update([$request->type => $request->val]);
        }else{
            return response()->json([
                'message' => 'error',
                'data' => [
                    'errors' => [
                        'limit' => 'Maksimum limit dolub'
                    ]
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json([
            'message' => 'success',
            'data' => []
        ]);
    }
}
