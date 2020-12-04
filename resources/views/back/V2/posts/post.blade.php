@extends('back.V2.layout.app')
@section('title', 'Məqalələr')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('V2/admin/css/switchery.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('V2/admin/css/bootstrap-tagsinput.css')}}" />
@endsection

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>{{__('nav.postCreate')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">{{__('nav.posts')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(!isset($post))
                                <a href="#!">{{__('nav.postCreate')}}</a>
                            @else
                                <a href="#!">{{__('nav.postUpdate')}}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{isset($post) ? $post->id : null}}">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="title" class="form-control"
                                                               value="{{ isset($post) ? $post->translation->title : old('title') }}"
                                                               placeholder="{{__('form.title')}}">
                                                        @error('title')
                                                            <span class="messages">
                                                                <p class="text-danger error"> {{ $message }} </p>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <input name="status" type="hidden" id="statusHidden"
                                                               value="{{\App\Models\V2\Posts\Post::DRAFT}}">
                                                        <input name="status" type="checkbox" class="js-single" checked
                                                               value="{{\App\Models\V2\Posts\Post::PUBLISHED}}"
                                                               {{ isset($post) && $post->status == \App\Models\V2\Posts\Post::PUBLISHED ? 'checked' : '' }} />
                                                        @error('status')
                                                            <span class="messages">
                                                                <p class="text-danger error"> {{ $message }} </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="slug" class="form-control"
                                                               value="{{ isset($post) ? $post->slug : old('slug') }}"
                                                               placeholder="slug">
                                                        @error('slug')
                                                            <span class="messages">
                                                                <p class="text-danger error"> {{ $message }} </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select name="format" id="" class="form-control fill">
                                                            <option value="" disabled selected>Məqalənin tipini seçin...</option>
                                                            @foreach($post_formats as $format => $name)
                                                                <option value="{{$format}}"
                                                                    {{ isset($post) && $post->format == $format?
                                                                        'selected' : '' }}
                                                                > {{ $name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('format')
                                                            <span class="messages">
                                                                <p class="text-danger error"> {{ $message }} </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <textarea name="body" rows="16" cols="5" class="form-control"
                                                                  placeholder="" id="body">{{ isset($post) ? $post->translation->body : old('body') }}</textarea>
                                                        @error('body')
                                                            <span class="messages">
                                                                <p class="text-danger error"> {{ $message }} </p>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mobile-inputs">
                                                <h4 class="sub-title">{{__('nav.category')}}</h4>
                                                <div class="form-group">
                                                    <select name="category_id" class="form-control fill">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"
                                                                {{ isset($post) && $post->category_id == $category->id ?
                                                                    'selected' : '' }}
                                                            >
                                                                {{ $category->translation->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <h4 class="title">SEO</h4>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="">{{__('form.metaTitle')}}</label>
                                                    <input name="meta_title" type="text" class="form-control form-control-primary"
                                                           value="{{ isset($post) ? $post->seo->meta_title : old('meta_title') }}" placeholder="">
                                                    @error('meta_title')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('form.metaDescription')}}</label>
                                                    <input name="meta_description" type="text" class="form-control form-control-primary"
                                                           value="{{ isset($post) ? $post->seo->meta_description : old('meta_description') }}" placeholder="">
                                                    @error('meta_description')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <label for="">{{__('form.metaKeywords')}}</label>
                                                <div class="tags_add">
                                                    <input name="meta_keywords" type="text" placeholder="" size="1"
                                                           value="{{ isset($post) ? $post->seo->meta_keywords : old('meta_keywords') }}" data-role="tagsinput">
                                                    @error('meta_keywords')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mobile-inputs">
                                                <h4 class="sub-title">{{__('form.images')}}</h4>
                                                <div class="form-group">
                                                    <label for="">{{__('form.coverImage')}}</label>
                                                    @if(isset($post))
                                                        <img src="{{asset('storage/'.$post->cover)}}" alt="" width="100%">
                                                    @endif
                                                    <input name="cover" type="file" class="form-control form-control-success" placeholder="">
                                                    @error('cover')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('form.thumbnailImage')}}</label>
                                                    @if(isset($post)  && $post->thumbnail_image)
                                                        <img src="{{asset('storage/'.$post->thumbnail_image)}}" alt="" width="100%">
                                                    @endif
                                                    <input name="thumbnail_image" type="file" class="form-control form-control-warning" placeholder="">
                                                    @error('thumbnail_image')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('form.carouselBannerImage')}}</label>
                                                    @if(isset($post)  && $post->carousel_banner_image)
                                                        <img src="{{asset('storage/'.$post->carousel_banner_image)}}" alt="" width="100%">
                                                    @endif
                                                    <input name="carousel_banner_image" type="file" class="form-control form-control-warning" placeholder="">
                                                    @error('carousel_banner_image')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('form.carouselSmallImage')}}</label>
                                                    @if(isset($post)  && $post->carousel_small_image)
                                                        <img src="{{asset('storage/'.$post->carousel_small_image)}}" alt="" width="100%">
                                                    @endif
                                                    <input name="carousel_small_image" type="file" class="form-control form-control-warning" placeholder="">
                                                    @error('carousel_small_image')
                                                        <span class="messages">
                                                            <p class="text-danger error"> {{ $message }} </p>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 mobile-inputs">
                                                <div class="form-group">
                                                    <button class="btn waves-effect waves-light btn-success btn-square btn-block">
                                                        {{__('form.save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>

@endsection

@section('unique-js')
    <script type="text/javascript" src="{{asset('V2/admin/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/swithces.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/jquery.slimscroll.js')}}"></script>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $('textarea#body').tinymce({
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });

        // trigger switch if publish status is 0
        $(document).ready(function () {
            if('{{isset($post) && $post->status == \App\Models\V2\Posts\Post::DRAFT}}'){
                $('.switchery').trigger('click')
            }
        })
    </script>
@endsection
