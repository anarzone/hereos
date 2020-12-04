@extends('back.V1.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>
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
                    @if(!count($posts) == 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}.</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{route('posts.edit', $post->slug)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                                        <span class="p-1"></span>
                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
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
                            <td>no posts available</td>
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
