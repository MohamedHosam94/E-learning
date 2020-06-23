@extends('layouts.app')


@include('layouts.website-navbar')


@section('layouts.landing-navbar')

@stop


@section('title')
{{ $userProfile->name }}
@endsection

@section('content')

<div class="section profile-content" style="margin-top: 15rem">
  <div class="container">
    <div class="owner">
      <div class="avatar">
        <img src="/frontend/img/placeholder.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
      </div>
      <div class="name">
        <h4 class="title">{{ $userProfile->name }}
          <br>
        </h4>
        <h6 class="description">{{ $userProfile->email }}</h6>
      </div>
    </div>

    @if( auth()->user() && $userProfile->id == auth()->user()->id )


    <br>
    <div class="row">
      <div class="col-md-6 ml-auto mr-auto text-center">

        <br>
        <btn onclick="$('#profileCard').slideToggle(500)" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Update Profile</btn>
      </div>
    </div>

    @include('frontend.profile.edit')
    @endif
  </div>
</div>


@endsection