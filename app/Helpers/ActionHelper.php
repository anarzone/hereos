<?php

namespace App\Helpers;

use App\Models\V2\Posts\Post;
use App\Models\V2\View;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait ActionHelper{
    private function uploadImage($img, $directory){
        $time = Carbon::now();
        $extension = $img->getClientOriginalExtension();
        $directory = $directory . date_format($time, 'Y') . '/' . date_format($time, 'm') . '/' . date_format($time, 'd');
        $filename = Str::random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;

        $store_Image = $img->storeAs($directory, $filename, 'public');
        $image_path = $directory . '/' .$filename;

        return $store_Image ? $image_path : false;
    }

    public function countClick($object){
        if(!$object->view){
            View::create([
                'client_id' => $object->id,
                'clicks' => 0,
                'unique_clicks' => 0
            ]);
        }

        return $object->view()->increment('clicks', 1);
    }

    public function topWeek($posts){
        $postsBySections = [];
        foreach ($posts as $i => $post){
            if($i == 0){
                $postsBySections['main'] = $post;
            }elseif($i > 0 && $i <= 4 ){
                $postsBySections['right'][] = $post;
            }else{
                $postsBySections['bottom'][] = $post;
            }
        }

        return $postsBySections;
    }

    public function relatedArticles($post){
        $keywords = explode(',', $post->seo->meta_keywords);
        $posts = Post::where('id', '!=', $post->id)->get();
        $postsById = [];
        $post_score = [];

        foreach ($posts as $post){
            $postsById[$post->id] = $post->seo->meta_keywords;
        }

        foreach ($postsById as $id => $myPost){
            $post_score[$id] = 0;
            foreach ($keywords as $keyword) {
                if (strpos($myPost, $keyword) !== false && $id !== $post->id) {
                    $post_score[$id] += 1;
                }
            }
        }

        arsort($post_score);
        $searchablePostIds = array_keys(array_slice($post_score,0,4, true));

        return Post::whereIn('id', $searchablePostIds)->get();
    }
}
