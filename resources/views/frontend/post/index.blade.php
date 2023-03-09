@extends('layouts.app')
@section('title',"$category->meta_title")
@section('meta_desp',"$category->meta_desp")
@section('meta_keyword',"$category->meta_keyword")
@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category-heading">
                    <h2 class="text-center">{{ $category->name }}</h2>
                </div>

                @forelse ($post as $postitem)

                <div class="card card-shadow mt-4">
                    <a href="{{ url('blogs/'. $category->slug.'/'.$postitem->slug) }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <h2>{{ $postitem->name }}</h2>
                        </div>
                    </a>
                    <h6>Posted On:{{ $postitem->created_at->format('d-m-Y') }}</h6>
                    <span class="ms-3">Posted By:{{ $postitem->user->name }}</span>
                </div>
                
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h2>No post available</h2>
                    </div>
                </div>
                @endforelse
                <div class="your-pagination">
                    {{ $post->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-2">
                    <h4>Advertising</h4>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection