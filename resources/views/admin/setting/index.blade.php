@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 mt-4">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
            <div class="card"><div class="card-header">
                <h1>Settings</h1>
            </div></div>
            <div class="card-body">
                <form action="{{ url('admin/settings') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label >Website name</label>
                        <input type="text" name="website_name" @if($setting) value="{{ $setting->website_name }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <label >Website Logo</label>
                        <input type="file" name="logo"  class="form-control" />
                        @if($setting)
                            <img src="{{ asset('uploads/settings/'.$setting->logo) }}" width="70px" height="70px" alt="">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label >Website Favicon</label>
                        <input type="file" name="favicon" class="form-control" />
                        @if($setting)
                            <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" width="70px" height="70px" alt="">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label >Description</label>
                        <textarea name="desp"class="form-control" rows="3">@if($setting) {{ $setting->desp }} @endif</textarea>
                    </div>
                    <h4>SEO - Meta tags</h4>
                    <div class="mb-3">
                        <label >Meta Title</label>
                        <input type="text" name="meta_title" @if($setting) value="{{ $setting->meta_title }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <label >Meta Keywords</label>
                        <input type="text" name="meta_keyword" @if($setting) value="{{ $setting->meta_keyword }}" @endif class="form-control">
                    </div>
                    <div class="mb-3">
                        <label >Meta Description</label>
                        <textarea name="meta_desp"class="form-control" rows="3">@if($setting) {{ $setting->meta_desp }} @endif</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection