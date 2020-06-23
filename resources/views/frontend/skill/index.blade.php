@extends('layouts.app')


@include('layouts.website-navbar')

    
    @section('layouts.landing-navbar')
    
    @stop
      

      @section('title')
           {{ $sk->name }} 
      @endsection

@section('content')
<div class="container" style="margin-top:6rem">
     
        <h1>{{ $sk->name }}</h1>  
         
    @include('frontend.shared.video-row')
    
</div>
@endsection
