@extends('layouts.app')


@include('layouts.website-navbar')


@section('layouts.landing-navbar')

@stop


@section('title')
{{ $video->name }}
@endsection

@section('meta_des' , $video->meta_des)

@section('meta_keywords' , $video->meta_keywords)

@section('content')
<div class="container" style="margin-top:6rem">
  <div class="title">
    <h1>{{ $video->name }}</h1>
  </div>

  <div class="row">
    <div class="col-md-12">

      @php
      $url = getYoutubeId($video->youtube)
      @endphp

      @if ($url)
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0"
        allowfullscreen></iframe>
      @endif

    </div>
  </div>


  <div class="row m-4">
    {{-- <div class="col-md-12"> --}}

    <p class="col-md-2">
      <i class="nc-icon nc-single-02"></i>
      {{ $video->name }}
    </p>

    <small class="col-md-2">
      <i class="nc-icon nc-watch-time"></i>
      {{ $video->created_at }}
    </small>

    @isset($video->cat)

    <p class="col-md-2">
      <i class="nc-icon nc-single-copy-04"></i>
      <a href=" {{ route('front.category' , $video->cat->id) }} ">
        {{ $video->cat->name }}
      </a>
    </p>
    @endisset


    @isset($video->tags)
    <p class="col-md-3">
      {{-- here we have to make the route and method for the tag --}}
      <span>Tags: </span> <br>
      @foreach ($video->tags as $tag)
      <a href=" {{ route('front.tag' , $tag->id) }} ">
        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
      </a>
      @endforeach
    </p>
    @endisset



    @isset($video->skills)
    <p class="col-md-3">
      <span>Skills: </span> <br>
      @foreach ($video->skills as $skill)
      <a href=" {{ route('front.skill' , $skill->id) }} ">
        <span class="badge badge-pill badge-warning">{{ $skill->name }}</span>
      </a>
      @endforeach
    </p>
    @endisset



    {{-- </div> --}}
  </div>

  <p>{{ $video->des }}</p>


  <br>
  <br>


  @include('frontend.video.comments')


  @include('frontend.video.create-comment')

</div>
@endsection