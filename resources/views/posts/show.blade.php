@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row pt-5">
        <div class="col-6 ">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>

        <div class="col-4">
            <div class="d-flex align-items-center ">
                <div class="row">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="height: 70px">
                </div>

                <h4 class="pl-4 font-weight-bold"><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></h4>
                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <hr>

            <h5>{{ $post->caption }}</h5>
        </div>
    </div>
</div>
@endsection
