@extends('layouts.app')








@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Manage Posts</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Post</a>
                <table class="table table-bordered">
                    <thead>
                    <th width="80px">Id</th>
                    <th >image</th>
                    <th>Title</th>
                    <th width="150px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <div style="width: 150px;height: 150px">
                                    @if(!empty($post->image))
                                        <img  class="card-img-top" src="{{asset($post->image_for_web)}}" alt="Card image cap" width="100%" height="100%">
                                    @endif
                                </div>

                            </td>

                            <td>{{ $post->title }}
                            <br>
                                {{ $post->content }}
                            </td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a>
                                    <br>
                                        <br>
                                    @if(auth()->user()->id==$post->author)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit Post</a>
                                    <br>
                                    <br>
                                    <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger">Delete Post</a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection








{{--@section('content')--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <a href="{{route('posts.create')}}" class="btn btn-primary">Add Post</a>--}}
{{--                    <div class="card-header">Posts</div>--}}
{{--                    <div class="card-group">--}}
{{--                    @foreach($posts as $post)--}}
{{--                    <div class="card col-lg-4" >--}}
{{--                        @if(!empty($post->image))--}}
{{--                                <img  class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap">--}}
{{--                        @endif--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$post->title}}</h5>--}}
{{--                            <p class="card-text">{{$post->content}}</p>--}}
{{--                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Show This Post</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--@endsection--}}
