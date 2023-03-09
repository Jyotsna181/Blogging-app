@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
        @endif
        <div class="card-header">
            <h1>Edit Post</h1>
        </div>
        <div class="card-body">
            
        <form action="{{ url('admin/update-post/'.$post->id) }}"  method="POST">
           @csrf
           @method('PUT')
            <div class="mb-3">
                <label for="">Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select category</option>
                    @foreach ($category as $cateitem)
                    <option value="{{ $cateitem->id }}" 
                    {{ $post->category_id == $cateitem->id ? 'selected':''}}  
                    >{{ $cateitem->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Post name</label>
                <input type="text" name="name" value="{{ $post->name }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
            </div>
            <div class="mb-3">
                  <label for="" class="form-label">Description</label>
                  <textarea class="form-control" value="" name="desp" id="mySummernote" rows="4">{!! $post->desp !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control">
            </div>

            <h4>SEO Tags</h4>
            <div class="mb-3">
                <label for="">Meta title</label>
                <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_desp" class="form-control" rows="3">{!! $post->meta_desp !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" class="form-control" value="" rows="3">{!! $post->meta_keyword !!}</textarea>
            </div>

            <h4>status</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-check">
                          <input class="form-check-input" name="status" type="checkbox" value="" id="">
                          <label class="form-check-label" for="">
                            Status
                          </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="mb-3">
                    <div class="d-grid gap-2">
                      <button type="submit" name="" id="" class="btn btn-primary">Update post</button>
                    </div>
                </div>
                </div>
            
            </div>
        </form>
        </div>
    </div>
</div>
@endsection