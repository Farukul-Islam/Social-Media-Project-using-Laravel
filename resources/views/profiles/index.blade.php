@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-3">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="height: 200px;">
        </div>
        
        <div class="col-9 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                
                <div class="d-flex align-items-center pb-2">
                    <div class="h3">{{ $user->username }}</div>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    
                </div>
                
                @can('update',$user->profile)
            
                    <a href="/p/create">Add new post</a>
           
                @endcan   
            </div>

            @can('update',$user->profile)
            <div class="pt-3 pb-3">
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            </div>
            @endcan

            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts()->count() }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-2 font-weight-bold" >{{ $user->profile->title }}</div>
            <div class="pt-1">{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div> 
    </div>
    <div class="row pt-5">

        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>

    
</div>
@endsection