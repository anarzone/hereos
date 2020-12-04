@extends('back.V1.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!count($categories) == 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}.</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{route('categories.edit', $category->slug)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                                        <span class="p-1"></span>
                                        <form action="{{ route('categories.destroy', $category->slug) }}" method="$category">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm ">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>categories not available</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
