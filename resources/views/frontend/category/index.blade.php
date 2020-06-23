@extends('layouts.app')


@include('layouts.website-navbar')

    
    @section('layouts.landing-navbar')
    
    @stop
      

      @section('title')
           {{ $cat->name }} 
      @endsection

      @section('meta_des' , $cat->meta_des)

      @section('meta_keywords' , $cat->meta_keywords)
          
      

@section('content')

<div class="section section-buttons">
  <div class="container" style="margin-top:6rem">
     <div class="title">
        <h1>{{ $cat->name }}</h1>  
     </div>
          
        @include('frontend.shared.video-row')
  </div>
</div>  
@endsection
