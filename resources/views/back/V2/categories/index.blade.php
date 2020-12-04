@extends('back.V2.layout.app')
@section('title', __('nav.categories'))

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('V2/Admin/css/jquery.minicolors.css')}}" />
@endsection

@section('content')
    <div class="page-header card">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('nav.categories')}}</h5>
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
                            <a href="{{ route('categories.all')}}">
                                {{ __('nav.categories')}}
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{__('nav.categories')}}</h5>
                                </div>
                                <div class="row card-block">
                                    <div class="col-md-12">
                                        <ul class="list-view categories">
                                            @if(isset($categories))
                                                @foreach($categories as $categoryItem)
                                                    <li>
                                                        <div class="card list-view-media">
                                                            <div class="card-block">
                                                                <div class="col-md-12">
                                                                    <h6 class="d-inline-block">
                                                                        {{$categoryItem->translation->name}} </h6>
                                                                    <button class="btn btn-sm btn-warning p-1 float-right ml-1 editCategory"
                                                                        id="{{$categoryItem->id}}"
                                                                    >
                                                                        <i class="icofont icofont-edit-alt"></i>Edit
                                                                    </button>
                                                                    <button class="btn btn-sm btn-danger p-1 float-right"
                                                                        onclick="deleteEl(
                                                                            this,
                                                                            '{{$categoryItem->id}}',
                                                                            '{{route('categories.delete', $categoryItem->id)}}',
                                                                            '{{__('messages.deleteTitle')}}',
                                                                            '{{__('messages.confirmText')}}',
                                                                            '{{__('messages.cancelText')}}',
                                                                            '{{__('messages.deleted')}}',
                                                                            true
                                                                        )
                                                                    ">
                                                                        <i class="icofont icofont-delete-alt"></i>Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{__('nav.categoryCreate')}}</h5>
                                </div>
                                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">

                                    <div class="row card-block">
                                        @csrf
                                        <div class="col-md-12">
                                            <ul class="list-view">
                                                <li>
                                                    <div class="card list-view-media">
                                                        <div class="card-block">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">{{__('form.title')}}</label>
                                                                    <input name="name" type="text" class="form-control" id="categoryName"
                                                                           value="{{old('name') }}" placeholder="">
                                                                    @error('name')
                                                                        <span class="messages">
                                                                            <p class="text-danger error"> {{ $message }} </p>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">{{__('form.slug')}}</label>
                                                                    <input name="slug" type="text" class="form-control" id="slug"
                                                                           value="{{old('slug') }}" placeholder="">
                                                                    @error('slug')
                                                                        <span class="messages">
                                                                            <p class="text-danger error"> {{ $message }} </p>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">{{__('form.coverImage')}}</label>
                                                                    <img src="" alt="" width="100%" id="cover">
                                                                    <input name="cover" type="file" class="form-control"
                                                                           value="" placeholder="">
                                                                    @error('cover')
                                                                        <span class="messages">
                                                                            <p class="text-danger error"> {{ $message }} </p>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">{{__('form.color')}}</label>
                                                                    <div class="color-hex">
                                                                        <input type="text" id="hue-demo" class="form-control demo"
                                                                               data-control="hue" value="{{old('hex_color')}}" name="color_hex">
                                                                    </div>
                                                                    @error('color_hex')
                                                                        <span class="messages">
                                                                            <p class="text-danger error"> {{ $message }} </p>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <input type="hidden" value="" name="category_id" id="category_id">
                                                                <div class="form-group">
                                                                    <button class="btn btn-success btn-block">{{__('form.save')}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('unique-js')
    <script type="text/javascript" src="{{asset('V2/admin/js/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/datedropper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/spectrum.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/jscolor.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/jquery.minicolors.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('V2/admin/js/custom-picker.js')}}"></script>
@endsection
@section('js')
    <script>
        $("#categoryName").keyup(function(){
            $("#slug").val(slugify($(this).val()));
        });

        $('.editCategory').on('click', function () {
            $.ajax({
                'type': 'GET',
                'url': '/manage/categories/'+ $(this).attr('id') + '/get',
                success: function (response) {
                    $('#category_id').val(response.data.id)
                    $('#slug').val(response.data.slug)
                    $('#categoryName').val(response.data.translation.name)
                    $('#cover').attr('src','/storage/'+response.data.cover)
                    $('#hue-demo').val(response.data.color_hex)
                    $('.minicolors-swatch-color').css('background-color',response.data.color_hex)

                }
            })
        })
    </script>
@endsection
