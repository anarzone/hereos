@extends('back.V1.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <form action="{{ route('categories.store') }}" method='POST'>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" {{ old('name') }}>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input name="slug" type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" {{ old('slug') }}>
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Save" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
