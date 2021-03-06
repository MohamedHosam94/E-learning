@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = 'pages';
  $pageTitle  = 'Edit ' . $moduleName; 
  $pageDesc   = ' Here you can edit ' . $moduleName;

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
              
             <form action="{{ route('pages.update' , $page ) }}" method="POST">
              @csrf
              @method('PUT')
    
               @include('Dashboard.pages.form')

               <button type="submit" class="btn btn-primary pull-right">
                  Update {{ $moduleName }}
                </button>
    
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
    
      </div> 

  @endsection
