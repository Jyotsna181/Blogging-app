@extends('layouts.app')
@section('title',"Blog App")
@section('meta_desp',"blogging")
@section('meta_keyword',"blogging")
@section('content')
<h2 class="text-center container mb-3 recent-blog">Recent Blogs</h2>

    @foreach ($latest_post as $latest_post_item)
    <div class="card container mb-3">
        <div class="card-body">
            <a href="{{ url('blogs/'.$latest_post_item->category->slug. '/' .$latest_post_item->slug)}}" class="text-decoration-none text-dark">
                <h4>{{ $latest_post_item->name }}</h4>
            </a>
        </div> 
    </div>
        
    @endforeach
@endsection