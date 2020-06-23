@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = 'pages';
  $pageTitle  = 'Replay ' . $moduleName; 
  $pageDesc   = ' Here you can Replay on ' . $moduleName;

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
              <h4 class="card-title"> {{ $pageTitle }} </h4>
              <p class="card-category"> {{ $pageDesc }} </p>
            </div>

            <div class="card-body">
            
    
               @include('Dashboard.messages.form')

    
                <div class="clearfix"></div>
              
            </div>
          </div>
        </div>
    
      </div> 

  @endsection
