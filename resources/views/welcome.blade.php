@extends('layouts.app')

@section('title' , 'Home')
    


@section('content')

    @include('frontend.homepage-sections.homeImage')
    
    @include('frontend.homepage-sections.videos')
   
    @include('frontend.homepage-sections.statistics')
   
    {{-- Keep in touch section --}}
    @include('frontend.homepage-sections.contactUs')
    {{-- End Keep in touch Section --}}
    
@endsection