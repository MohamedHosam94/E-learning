@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = ' pages ';
  $pageTitle  = 'Create ' . $moduleName; 
  $pageDesc   = 'Here you can create ' . $moduleName;

 @endphp
  
 @section('title')
      {{ $pageTitle }}
  @endsection

  @section('content')
      
    @component('Dashboard.layout.header')

      @slot('nav_title')
       {{ $pageDesc }}
      @endslot
      
    @endcomponent

   <div class="row">
      
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">{{ $pageTitle }}</h4>
          <p class="card-category">{{ $pageDesc }}</p>
        </div>
        <div class="card-body">
          
         <form action="{{ route('pages.store') }}" method="POST">
          @csrf

           @include('Dashboard.pages.form')

           <button type="submit" class="btn btn-primary pull-right">
              Add {{$moduleName}}
            </button>
            
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

  </div> 

  @endsection
