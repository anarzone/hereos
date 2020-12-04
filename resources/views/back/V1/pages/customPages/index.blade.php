@extends('back.V1.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">pages</h3>
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
                    @if(!count($pages) == 0)
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}.</td>
                                <td>{{ $page->title }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{route('pages.edit', $page->slug)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                                        <span class="p-1"></span>
                                        <form action="{{ route('pages.destroy', $page->slug) }}" method="Post">
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
                            <td>no pages available</td>
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
