@extends('Dashboard.layout.app')

 @php
 
  // $moduleName = 'Users';
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
                  <a href="{{ route('users.create') }}" class="btn btn-purple btn-round">
                    Add {{ $moduleName }}
                  </a>
                </div>
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
                      Group
                    </th>
                   
                    <th class="text-right">
                      Control
                    </th>
                  </tr></thead>
                  
                  <tbody>
                   @foreach ($users as $user)
                        
                    <tr>
                        <td> {{ $user->id }}</td>
                  
                        <td> {{ $user->name }}</td>
                   
                        <td> {{ $user->email }}</td>

                        <td> {{ $user->group }}</td>

                        <td class="td-actions text-right">
                            <a href="{{ route('users.edit' , $user) }}" type="button" rel="tooltip" title="" class="btn btn-grey btn-link btn-sm" data-original-title="Edit 
                            {{ $moduleName }}">
                              <i class="material-icons">edit </i>
                             </a>

                          <form action="{{ route('users.destroy' , $user) }}" method="post">                         
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
                {{ $users->links() }}
              </div>
            </div>
          </div>
        </div>
       
    </div>


  @endsection
