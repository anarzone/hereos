@extends('back.V2.layout.app')
@section('title', __('nav.posts'))
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>{{ request()->segment(3) == 'archive' ? __('nav.archive') : __('nav.posts')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ request()->segment(3) == 'archive' ? route('manage.posts.all') : route('archive')}}">
                                {{ request()->segment(3) == 'archive' ? __('nav.archive') : __('nav.posts')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-styling">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>#</th>
                                            <th>{{__('form.title')}}</th>
                                            <th>{{__('form.slug')}}</th>
                                            <th>{{__('nav.category')}}</th>
                                            <th>{{__('form.author')}}</th>
                                            <th>{{__('form.status')}}</th>
                                            <th>{{__('nav.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <th scope="row">{{$post->id}}</th>
                                                <td>{{$post->translation->title}}</td>
                                                <td>{{$post->slug}}</td>
                                                <td>{{$post->category->translation->name}}</td>
                                                <td>{{$post->user->fullname}}</td>
                                                <td>
                                                    <label class="label
                                                            {{$post->status == \App\Models\V2\Posts\Post::PUBLISHED ? 'label-success' : 'label-danger'}}
                                                        " data-post-id="{{$post->id}}" style="cursor: pointer">
                                                        {{$post->status == \App\Models\V2\Posts\Post::PUBLISHED ? __('form.statusPublished')
                                                           : __('form.statusDraft')
                                                        }}
                                                    </label>
                                                </td>
                                                <td>
                                                    @if(request()->segment(3) != 'archive')
                                                        <div class="label-main" style="margin: 0;">
                                                            <label class="label label-warning editPost" data-post-id="{{$post->id}}" style="cursor: pointer">
                                                                {{__('form.edit')}}
                                                            </label>
                                                        </div>
                                                        <div class="label-main" style="margin: 0; cursor: pointer">
                                                            <label class="label label-danger deletePost" data-post-id="{{$post->id}}" style="cursor: pointer"
                                                                onclick="deleteEl(
                                                                            this,
                                                                            '{{$post->id}}',
                                                                            '{{route('posts.changeStatus', ['slug' => $post->id, 'status' => \App\Models\V2\Posts\Post::ARCHIVED])}}',
                                                                            '{{__('messages.archivedTitle')}}',
                                                                            '{{__('messages.confirmText')}}',
                                                                            '{{__('messages.cancelText')}}',
                                                                            '{{__('messages.archived')}}',
                                                                        )"
                                                            >
                                                                {{__('form.delete')}}
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="label-main" style="margin: 0;">
                                                            <label class="label label-success restore" data-post-id="{{$post->id}}" style="cursor: pointer"
                                                                   onclick="deleteEl(
                                                                           this,
                                                                           '{{$post->id}}',
                                                                           '{{route('posts.changeStatus', ['slug' => $post->id, 'status' => \App\Models\V2\Posts\Post::DRAFT])}}',
                                                                           '{{__('messages.restoreTitle')}}',
                                                                           '{{__('messages.confirmText')}}',
                                                                           '{{__('messages.cancelText')}}',
                                                                           '{{__('messages.restored')}}',
                                                                       )"
                                                            >
                                                                {{__('form.restore')}}
                                                            </label>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.editPost').on('click', function () {
            let postId = $(this).data('post-id')
            window.location.href = '/manage/posts/'+postId+'/edit';
        })
    </script>
@endsection
