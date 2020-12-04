@extends('back.V1.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>
                <form action="{{route('posts.restore_all')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-outline-success float-right">
                        <i class="fas fa-trash-restore"></i> Restore all
                    </button>
                </form>
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
                                        <form action="{{ route('posts.restore_post') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="text" name="post_id" hidden value="{{ $post->id }}">
                                            <button class="btn btn-outline-success btn-sm">
                                                <i class="fas fa-trash-restore"></i> Restore
                                            </button>
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
