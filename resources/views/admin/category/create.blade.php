@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
    
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="desp" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" name="meta_desp" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" name="meta_keyword" class="form-control"></textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection