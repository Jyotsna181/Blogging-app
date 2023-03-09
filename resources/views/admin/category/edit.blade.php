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
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            
            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="desp" class="form-control">{{ $category->desp }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" name="meta_desp" class="form-control">{{ $category->meta_desp }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" name="meta_keyword"class="form-control">{{ $category->keyword }}</textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status =='1' ? 'checked':'' }}>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $category->status =='1' ? 'checked':'' }}>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection