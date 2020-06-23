<div class="sidebar" data-color="purple" data-background-color="black" data-image="/assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
    <a href="{{ route('home')}}" class="simple-text logo-normal">
        Website Landing
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ request()->is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>

      <li class="nav-item {{ request()->is('admin/users*') ? 'active' : ''}}">
         <a class="nav-link" href="{{ route('users.index') }}">
            <i class="material-icons">person</i>
            <p>Users</p>
          </a>
        </li>

        <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('categories.index') }}">
             <i class="material-icons">scatter_plot</i>
             <p>Categories</p>
           </a>
         </li>

         <li class="nav-item {{ request()->is('admin/skills*') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('skills.index') }}">
             <i class="material-icons">offline_bolt</i>
             <p>Skills</p>
           </a>
         </li>

         <li class="nav-item {{ request()->is('admin/tags*') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('tags.index') }}">
             <i class="material-icons">bookmark_border</i>
             <p>Tags</p>
           </a>
         </li>

         <li class="nav-item {{ request()->is('admin/pages*') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('pages.index') }}">
             <i class="material-icons">content_paste</i>
             <p>Pages</p>
           </a>
         </li>

         <li class="nav-item {{ request()->is('admin/videos*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('videos.index') }}">
               <i class="material-icons">video_call</i>
               <p>Videos</p>
             </a>
          </li>

          <li class="nav-item {{ request()->is('admin/messages*') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('messages.index') }}">
               <i class="material-icons">message</i>
               <p>Messages</p>
             </a>
          </li>
        <!-- your sidebar here -->
      </ul>
    </div>
  </div>