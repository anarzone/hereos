<?php

namespace App\Http\Controllers\V2\Front;

use App\Models\V2\Categories\Category;
use App\Helpers\ActionHelper;
use App\Http\Controllers\Controller;
use App\Models\V2\Posts\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ActionHelper;

    public function index(){
        $topPosts = Post::with('view')
            ->leftJoin('views', 'posts.id', '=', 'client_id')
            ->select('posts.*', 'views.clicks')
            ->orderBy('clicks')
            ->get()
            ->take(8);

        $data = [
            'latestPosts' => Post::latest()->paginate(10),
        ];

        return view('front.V2.posts.index', $data);
    }

    public function show(Post $slug){
        $this->countClick($slug);
        $data = [
            'post' => $slug,
            'latestThreePosts' => Post::latest()->take(3)->get(),
            'previousPost' => Post::where('id', '<', $slug->id)->first(),
            'nextPost' => Post::where('id', '>', $slug->id)->first(),
            'relatedPosts' => $this->relatedArticles($slug),
        ];

        return view('front.V2.posts.single', $data);
    }

    public function getCategoryPosts(Category $category){
        return view('front.V2.posts.category_posts', [
            'category' => $category,
            'latestThreePosts' => Post::latest()->take(3)->get(),
            'widgetPosts' => Post::where('category_id', Category::INTERESTING_ID)->latest()->take(4)->get(),
        ]);
    }

    public function search(Request $request){
        $request->validate([
            'term' => 'string'
        ]);

        $data = [
            'latestPosts' => Post::with([
                                    'translations' => function($query) use ($request){
                                        return $query->where('title', 'LIKE', '%'.$request->term.'%')
                                               ->orWhere('body', 'LIKE', '%'.$request->term.'%');
                                    }
                                ])
                                ->latest()
                                ->paginate(10),
        ];

        return view('front.V2.posts.index', $data);
    }
}
