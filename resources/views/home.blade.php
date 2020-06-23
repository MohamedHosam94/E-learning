@extends('layouts.app')


  @include('layouts.website-navbar')

      @section('layouts.landing-navbar')
    
      @stop
      
@section('content')

<div class="section section-buttons">
  <div class="container" style="margin-top:4rem">
    <div class="title"> 
      <h2>Latest videos</h2>
        
          @if ( request()->has('search') && request()->get('search') != '' )
             <br>
            You are searching on <b>{{ request()->get('search') }}</b> | <a href="{{ route('home')}}">Reset</a>
            
          @endif
          
      </div>
      <div class="row " style="min-height:450px">
        
        @foreach ($videos as $video)
        <div class="col-lg-4">
          @include('frontend.shared.video-card') 
        </div>      
        @endforeach
          
      </div>

      <div class="row">
        <div class="col-md-12">{{ $videos->links() }}</div>
      </div>
  </div>
</div>
@endsection
