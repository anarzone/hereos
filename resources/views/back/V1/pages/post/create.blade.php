@extends('back.V1.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('back/dist/css/bootstrap-toggle.min.css') }}">
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }

</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <form action="{{ route('posts.store') }}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input name="title" type="text" id="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title') }}" placeholder="write cool title"
                                            >
                                            @error('title')
                                                <small class="alert alert-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input name="slug" type="text" id="slug"
                                                   class="form-control @error('slug') is-invalid @enderror"
                                                   value="{{ old('slug') }}" placeholder="post-slug">
                                            @error('slug')
                                                <small class="alert alert-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Categories</label>
                                            <select class="form-control custom-select" name="cat_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ $category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cover_image">Upload cover image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="cover_image" id="cover_image">
                                                    <label class="custom-file-label" for="cover_image">Choose cover image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="thumbnail_image">Upload thumbnail image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="thumbnail_image" id="thumbnail_image">
                                                    <label class="custom-file-label" for="cover_image">Choose thumbnail image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="body" id="body"
                                              class="form-control @error('body') is-invalid @enderror"
                                              rows="4" placeholder="start typing ">{{ old('body') }}</textarea>
                                    @error('body')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header text-center">
                                <h1>SEO</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="seo_title" class="col-sm-2 col-form-label">Search engine title</label>
                                    <div class="col-sm-10">
                                        <input name="seo_title" id="seo_title" class="form-control @error('seo_title') is-invalid @enderror" value="{{ old('seo_title') }}" >
                                    </div>
                                    @error('seo_title')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="seo_description" class="col-sm-2 col-form-label">Search engine desc.</label>
                                    <div class="col-sm-10">
                                        <input name="seo_description" type="text" id="seo_description" class="form-control @error('seo_description') is-invalid @enderror" value="{{ old('seo_description') }}" >
                                    </div>
                                    @error('seo_description')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="seo_keywords" class="col-sm-2 col-form-label">Search engine keywords</label>
                                    <div class="col-sm-10">
                                        <input name="seo_keywords" type="text" id="tags" class="form-control @error('seo_keywords') is-invalid @enderror" value="{{ old('seo_keywords') }}" >
                                    </div>
                                    @error('seo_keywords')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label class="checkbox-inline float-right">
                            <input name="status" type="hidden" id="statusHidden" value="0">
                            <input name="status" id="toggle-event" type="checkbox" checked data-toggle="toggle" data-style="ios" value="1"> Publish
                        </label>
                    </div>
                    <!-- /.col -->
                    <div class="col-10">
                        <input type="submit" value="Create" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{{asset('back/dist/js/bootstrap-toggle.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.alert').removeAttr('style').css({
                'position':         'relative',
                'padding':          '2px',
                'marginBottom':     '1rem',
                'border':           '1px solid transparent',
                'borderRadius':     '.25rem',
            })
        })

        let editor_config = {
            path_absolute : "/",
            selector:'textarea#body',
            // width: 900,
            height: 300,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };
        tinymce.init(editor_config);

        $('#cover_image').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName.substring("C:/fakepath/".length));
        })

        $('#thumbnail_image').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName.substring("C:/fakepath/".length));
        })

        if(document.getElementById("status").checked) {
            document.getElementById('statusHidden').disabled = true;
        }
    </script>
@endsection
