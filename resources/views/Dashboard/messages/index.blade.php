@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = 'pages';
  $pageTitle  = 'Control ' . $moduleName; 
  $pageDesc   = ' Here you can Replay / delete ' . $moduleName;

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

               {{-- <div class="col-md-4 text-right">
                  <a href="{{ route('messages.create') }}" class="btn btn-purple btn-round">
                    Add {{ $moduleName }}
                  </a>
                </div> --}}
              </div> 
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr><th>
                      ID
                    </th>
                    
                    <th>
                      Name
                    </th>
                 
                    <th>
                      Email
                    </th>
                   
                    <th>
                      Message
                    </th>

                    <th class="text-right">
                      Control
                    </th>
                  </tr></thead>
                  
                  <tbody>
                   @foreach ($messages as $message)
                        
                    <tr>
                        <td> {{ $message->id }}</td>
                  
                        <td> {{ $message->name }}</td>
                   
                        <td> {{ $message->email }}</td>

                        <td> {{ $message->message }}</td>

                        <td class="td-actions text-right">
                            <a href="{{ route('messages.edit' , $message) }}" type="button" rel="tooltip" title="" class="btn btn-grey btn-link btn-sm" data-original-title="Replay on
                            {{ $moduleName }}">
                              <i class="material-icons">edit </i>
                             </a>

                          <form action="{{ route('messages.destroy' , $message) }}" method="post">                         
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

                {{ $messages->links() }}
              </div>
            </div>
          </div>
        </div>
       
    </div>


  @endsection
