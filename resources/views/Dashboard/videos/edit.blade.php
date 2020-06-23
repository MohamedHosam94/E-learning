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
              
             <form action="{{ route('videos.update' , $video ) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
    
               @include('Dashboard.videos.form')

               <button type="submit" class="btn btn-primary pull-right">
                  Update {{ $moduleName }}
                </button>
    
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
    


      @php
        $url = getYoutubeId($video->youtube) 
      @endphp

      @if ($url)

        <div class="col-md-4">
          <div class="card">  
            <div class="card-body">
                           
                <iframe width="250" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen></iframe>


                <img src="{{ url('uploads/' . $video->image) }}" width="250" style="margin-top:10px">
            </div>
           
          </div>
        </div>

      @endif 



      </div> 

      {{-- This row is for comments in videos edit  --}}
  <div class="row">

      <div class="col-md-8">
        <div class="card"> 

          <div class="card-header card-header-primary">
              <h4 class="card-title"> Comments </h4>
              <p class="card-category"> Here you can control comments </p>
          </div>
          <div class="card-body">
              @include('Dashboard.comments.index')
          </div>
          
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">  
          <div class="card-body">
              @include('Dashboard.comments.create')
          </div>
          
        </div>
      </div>
      
  </div>
      

  @endsection
