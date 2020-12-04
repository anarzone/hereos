@extends('back.V2.layout.app')

@section('title', __('nav.bannerPosts'))

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('V2/admin/css/datatables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('V2/admin/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('V2/admin/css/component.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>{{ $title }}</h5>
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
                            @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'editor')
                                <a href="{{route('editor')}}">
                                    {{__('nav.editorPosts')}}
                                </a>
                            @else
                                <a href="{{route('banner')}}">
                                    {{__('nav.bannerPosts')}}
                                </a>
                            @endif
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

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ $title }}</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row" id="draggablePanelList">
                                        @foreach($editorPosts as $editorPost)
                                            <div class="col-lg-12 col-xl-3">
                                                <div class="card-sub">
                                                    <img class="card-img-top img-fluid" src="{{asset('storage/'.$editorPost->thumbnail_image)}}"
                                                         alt="Card image cap">
                                                    <div class="card-block">
                                                        <h5 class="card-title">{{$editorPost->translation->title}}</h5>
                                                        <p class="card-text">{{strip_tags(\Illuminate\Support\Str::limit($editorPost->translation->body, 50, '...'))}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h5>{{__('nav.posts')}}</h5>
                                </div>
                                <div class="col-sm-2">
                                    <span class="float-right bg-success p-1">Banner</span>
                                    <span class="float-right bg-info p-1">Editor</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="posts" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th> {{__('form.title')}} </th>
                                            <th>{{__('form.slug')}}</th>
                                            <th>{{__('form.createdDate')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr data-modal="modal-3"
                                                data-post-id="{{$post->id}}"
                                                onclick="bannerToggle({{$post->id}})"
                                                class="md-trigger
                                                    @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'editor' && $post->editor)
                                                        bg-info
                                                    @elseif(\Illuminate\Support\Facades\Route::currentRouteName() == 'banner' && $post->banner)
                                                        bg-success
                                                    @endif
                                                "
                                            >
                                                <td>{{ $post->translation->title }}</td>
                                                <td>{{ $post->slug }}</td>
                                                <td>{{ $post->created_at }}</td>
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

    <div class="md-modal md-effect-3" id="modal-3">
        <div class="md-content pb-3">
            <h3>
                {{\Illuminate\Support\Facades\Route::currentRouteName() == 'editor' ? __('form.editorPostDialog') : __('form.bannerPostDialog')}}
            </h3>
            <div>
                <select name="type" class="form-control fill mb-2" id="typeSelect">
                    <option value="1">
                        {{__('form.yes')}}
                    </option>
                    <option value="0">
                        {{__('form.nope')}}
                    </option>
                </select>
                <div>
                    <button type="button"
                            class="btn btn-success btn-sm waves-effect float-right saveType">
                        {{__('form.confirm')}}
                    </button>
                    <button type="button"
                            class="btn btn-primary btn-sm waves-effect md-close float-right mr-2" onclick="$('.modal-backdrop').remove();">
                        {{__('form.close')}}
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('unique-js')
    <script src="{{asset('V2/admin/js/jquery.datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/datatables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/buttons.html5.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('V2/admin/js/sortable.js')}}" type="text/javascript" ></script>
    <script src="{{asset('V2/admin/js/sortable-custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/data-table-custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/sweetalert.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('V2/admin/js/modal.js')}}" type="text/javascript" ></script>
    <script src="{{asset('V2/admin/js/classie.js')}}" type="text/javascript"></script>
    <script src="{{asset('V2/admin/js/modaleffects.js')}}" type="text/javascript" ></script>
@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>

        let postId = null;

        $(document).ready( function () {
            $('#posts').DataTable({
                paging:true
            });
        } );

        function bannerToggle(post_id){
            postId = post_id;
            $('<div class="modal-backdrop show"></div>').appendTo(document.body)
            $('#modal-3').modal('show')
        }

        $('.saveType').on('click', function(){
            let val = $('#typeSelect option:selected').val()
            $.ajax({
                type: 'PUT',
                url: '/manage/posts/'+postId+'/update/type',
                data: {val, type: '{{\Illuminate\Support\Facades\Route::currentRouteName()}}'},
                success: function (response) {
                    if(response.message === 'success'){
                        location.reload();
                    }else{
                        console.log(response.data)
                    }
                }
                // handle error validation
            })
        })

    </script>
@endsection
