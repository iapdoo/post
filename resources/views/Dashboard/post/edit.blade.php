@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    @include('layouts.massage')
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="{{route('posts.update',$post->id)}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div style="height: 150px;width: 150px">
                                        @if(!empty($post->image))
                                            <img src="{{asset($post->image)}}" height="100%" width="100%">
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Post Title </label>
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                <input type="text" value="{{$post->title}}" name="title"
                                                       class="form-control"
                                                       placeholder="  Post Title">
                                                @error("title")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1" style="margin-top: 40px">Post Image</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="image">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1"> Post Content </label>
                                                <textarea name="content"
                                                          class="form-control"
                                                          placeholder="  Post Content ">{{$post->content}}</textarea>

                                                @error("content")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> update Post
                                    </button>
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
