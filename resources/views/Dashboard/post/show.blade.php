@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <table class="table table-bordered">
                        <thead>


                        <th>Title</th>
                        <th>Content</th>
                        <th >image</th>
                        </thead>
                        <tbody>

                            <tr>



                                <td>{{ $post->title }}
                                </td>
                                <td>{{ $post->content }}
                                </td>
                                <td>
                                    <div style="width:  50px;height:  50px">
                                        @if(!empty($post->image))
                                            <img  class="card-img-top" src="{{asset($post->image_for_web)}}" alt="Card image cap" width="100%" height="100%">
                                        @endif
                                    </div>

                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <div class="card-body">
                        <h4>Display Comments</h4>


                        @foreach($post->comment as $comment)
                            <p>{{$comment->user->name}} :: {{$comment->comment}}</p>
                        @if(auth()->user()->id==$comment->user_id)
                            <a href="{{route('comments.destroy',$comment->id)}}"> delete comment</a>
                            @endif
                        @endforeach

                        <hr />
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="comment"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
