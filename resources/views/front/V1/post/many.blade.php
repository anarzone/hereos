

@foreach($posts as $post)
    <div>
        <article class="masonry__brick entry format-standard animate-this">

            <div class="entry__thumb">
                <a href="{{route('post.single', $post->slug)}}" class="entry__thumb-link">
                    <img src="{{asset('storage/thumbnail_images/'.$post->thumbnail_image)}}"
                         alt="">
                </a>
            </div>

            <div class="entry__text">
                <div class="entry__header">
                    <h2 class="entry__title"><a href="{{route('post.single', $post->slug)}}">{{$post->title}}</a></h2>
                    <div class="entry__meta">
                        <span class="entry__meta-cat">
                            <a href="{{route('category.single', $post->category->slug)}}">{{$post->category->name}}</a>
                        </span>
                        <span class="entry__meta-date">
                            <span>{{date('Y-m-d', strtotime($post->updated_at))}}</span>
                        </span>
                    </div>
                </div>
                <div class="entry__excerpt">
                    <p>
                        {{ str_limit($post->title, 30) }}
                    </p>
                </div>
            </div>

        </article> <!-- end article -->
    </div>
@endforeach

