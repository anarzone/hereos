<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request){
        $posts = Post::with('category')->where('status', 1)->where('is_deleted', 0)
            ->orderBy('created_at', 'desc')->paginate(5);

        return view('front.post.index', compact('posts'));
    }

    public function showCategory(Category $slug, Request $request){

        $posts = Post::with('category')->where('cat_id', $slug->id)->where('status', 1)
            ->where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('front.post.index', [
            'posts' => $posts,
        ]);
    }

    public function showPost(Post $slug){
        $author = User::where('id', $slug->user_id)->first();
        $category = Category::where('id', $slug->cat_id)->first();

        $keywords = explode(',', $slug->seo_keywords);

        $all_posts = Post::select('id', 'seo_keywords')->where('is_deleted', '=', '0')->where('id', '!=', $slug->id)->get();
        $post_by_id = [];
        $post_score = [];

        foreach ($all_posts as $post){
            $post_by_id[$post->id] = $post->seo_keywords;
        }

        foreach ($post_by_id as $id => $post){
            $post_score[$id] = 0;
            foreach ($keywords as $keyword) {
                if (strpos($post, $keyword) !== false && $id !== $slug->id) {
                    $post_score[$id] += 1;
                }
            }
        }
        arsort($post_score);
        $ids_to_search_in = array_keys(array_slice($post_score,0,3, true));
        $related_posts = Post::whereIn('id', $ids_to_search_in)->get();

        $read_time = $this->wordCounter($slug->body);

        return view('front.post.single', [
            'post'=>$slug,
            'user'=>$author,
            'category' => $category,
            'related_posts' => $related_posts,
            'read_time' => $read_time
        ]);
    }

    public function showPage(Page $slug){
        return view('front.pages.single', [
            'page' => $slug,
        ]);
    }

    public function searchPage(Request $request){
        $query_word = $request->validate([
            's' => 'string'
        ]);
        if($query_word == []){
            $search_key = session('search_key');

        }else{
            $request->session()->put('search_key', $query_word['s']);
            $search_key = session('search_key');
        }


        $posts = Post::where('is_deleted', 0)->where('seo_keywords', 'LIKE', '%'.$search_key.'%')->paginate(6);
        $alternative_posts = Post::where('is_deleted', 0)->latest()->get();

        return view('front.post.index', [
            'posts' => $posts,
            'alternative_posts' => $alternative_posts
        ]);
    }

    public function wordCounter($content, $word=250){
        $content = strip_tags($content);
        $content = str_replace('&nbsp;', '', $content);
        $count = str_word_count($content);

        $minutes = floor($count / 200);
        $seconds = floor($count % 200 / (200 / 60));


        if ($minutes == 0) {
            return "{$seconds} san.";
        }
        else {
            return "{$minutes} dəq., {$seconds} san.";
        }

    }
}
