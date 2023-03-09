@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        
        <div class="card-header">
            <h4>Edit User
                <a href="{{  url('admin/users') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        
           
            <div class="mb-3">
                <label >Full name</label>
                <p class="form-control">{{ $user->name }}</p>
            </div>
            <div class="mb-3">
                <label>Email id</label>
                <p class="form-control">{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                  <label>Created At</label>
                  <p class="form-control">{{ $user->created_at->format('D/M/Y') }}</p> 
            </div>
            <form action="{{ url('admin/update-user/'.$user->id)}}"  method="POST">
           @csrf
           @method('PUT')
            <div class="mb-3">
                  <label>Role</label>
                  <select name="role_as" id="" class="form-control">
                    <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                    <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                    <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                  </select>
            </div>
            <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Update user</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection