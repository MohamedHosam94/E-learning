@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = 'pages';
  $pageTitle  = 'Control ' . $moduleName; 
  $pageDesc   = ' Here you can add / edit / delete ' . $moduleName;

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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
               <div class="col-md-8">
                 <h4 class="card-title ">{{ $pageTitle }}</h4>
                 <p class="card-category"> {{ $pageDesc }} </p>
               </div>

               <div class="col-md-4 text-right">
                  <a href="{{ route('videos.create') }}" class="btn btn-purple btn-round">
                    Add {{ $moduleName }}
                  </a>
                </div>
              </div> 
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-primary col-md-12">
                    <tr><th class="">
                      ID
                    </th>
                    
                    <th class="">
                      Name
                    </th>
                 
                    <th class="">
                      Published
                    </th>
                   
                    <th class="">
                       Category
                    </th>

                    <th class="">
                        User
                    </th>

                    <th class="text-right">
                      Control
                    </th>
                  </tr></thead>
                  
                  <tbody class="col-md-12">
                   @foreach ($videos as $video)
                        
                    <tr>
                        <td class="col-md-1"> {{ $video->id }}</td>
                  
                        <td class="col-md-3"> {{ $video->name }}</td>
                   
                        <td class="col-md-2"> 
                          {{-- {{ $video->published }} --}}
                        @if ( $video->published == 1 )
                           published 
                        @else
                           hidden 
                        @endif
                                               
                        </td>

                        <td class="col-md-3">{{ isset($video->cat->name) ? $video->cat->name : 'category not found' }}</td>

                        <td class="col-md-2"> {{ isset($video->user->name) ? $video->user->name : 'User no found' }}</td>

                        <td class="td-actions text-right">
                            <a href="{{ route('videos.edit' , $video) }}" type="button" rel="tooltip" title="" class="btn btn-grey btn-link btn-sm" data-original-title="Edit 
                            {{ $moduleName }}">
                              <i class="material-icons">edit </i>
                             </a>

                          <form action="{{ route('videos.destroy' , $video) }}" method="post">                         
                            @csrf
                            @method('delete')
                            <button type="submit" rel="tooltip" title="" class="btn btn-grey btn-link btn-sm" data-original-title="Remove 
                            {{ $moduleName }}">
                              <i class="material-icons">delete </i>
                            </button>
                          
                          </form>
                        </td>
                    </tr>

                   @endforeach
                  </tbody>
                </table>

                {{ $videos->links() }}
              </div>
            </div>
          </div>
        </div>
       
    </div>


  @endsection
