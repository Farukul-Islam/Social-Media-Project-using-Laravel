@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-5">
        <div class="col-6 offset-3">
            <div class="d-flex align-items-center ">
                <div class="row">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="height: 70px">
                </div>
                <h4 class="pl-3 font-weight-bold"><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></h4>
                <h5 class="pl-3">  {{ $post->caption }}</h5>
            </div>
            <hr>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->Links() }}
        </div>
    </div>
</div>
@endsection
