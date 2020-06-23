@extends('layouts.app')


@include('layouts.website-navbar')

    
    @section('layouts.landing-navbar')
    
    @stop
      

      @section('title')
           {{ $page->name }} 
      @endsection

      @section('meta_des' , $page->meta_des)

      @section('meta_keywords' , $page->meta_keywords)

@section('content')

 <div class="section section-buttons text-center" style="min-height: 600px">
        <div class="container" style="margin-top:4rem">
            <div class="title">
                <h1>{{ $page->name }}</h1>  
            </div>
             <p>
                {!! $page->des !!}
             </p>
        </div>
  </div>
@endsection
