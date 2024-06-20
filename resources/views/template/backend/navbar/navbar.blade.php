<style type="text/css">
    #header-setting {
       /*Gradient*/
       /*background: linear-gradient(0deg, rgba(0,161,253,1) 0%, rgb(33 176 255) 54%, rgba(0,161,253,1) 100%);*/
       /*Polos*/
       background-color: #263a4e;
    }
    .dropdown-item:hover {
       cursor: pointer;
    }
 </style>
 
 <header class="topbar-nav">
    <nav id="header-setting" class="navbar navbar-expand fixed-top">
       <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
             <a class="nav-link toggle-menu" href="javascript:void();">
             <i class="icon-menu menu-icon"></i>
             </a>
          </li>
          {{-- <li class="nav-item">
             <form class="search-bar">
                <input type="text" class="form-control" placeholder="Enter keywords">
                <a href="javascript:void();"><i class="icon-magnifier"></i></a>
             </form>
          </li> --}}
       </ul>
       <ul class="navbar-nav align-items-center right-nav-link">  
          {{-- <li class="nav-item dropdown-lg">
             <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
             <i class="fa fa-bell-o"></i><span class="badge badge-light badge-up">0</span></a>
             <div class="dropdown-menu dropdown-menu-right">
                <ul class="list-group list-group-flush">
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      You have 0 Notifications
                      <span class="badge badge-info">0</span>
                   </li>
                   <li class="list-group-item">
                      <a href="javaScript:void();">
                         <div class="media">
                            <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                            <div class="media-body">
                               <h6 class="mt-0 msg-title">New Registered Users</h6>
                               <p class="msg-info">Lorem ipsum dolor sit amet...</p>
                            </div>
                         </div>
                      </a>
                   </li>
                   <li class="list-group-item text-center"><a href="javaScript:void();">See All Notifications</a></li>
                </ul>
             </div>
          </li> --}}
          <li class="nav-item">
             <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
             @if(Auth::user()->jenis_kelamin == 1)
             <span class="user-profile"><img src="{{ asset('assets/img/pria.jpg') }}" class="img-circle" alt="User Pria"></span>
             @else
             <span class="user-profile"><img src="{{ asset('assets/img/wanita.jpg') }}" class="img-circle" alt="User Wanita"></span>
             @endif
             </a>
             <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item user-details">
                   <a href="javaScript:void();">
                      <div class="media">
                         @if(Auth::user()->jenis_kelamin == 1)
                         <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('assets/img/pria.jpg') }}" alt="User Pria"></div>
                         @else
                         <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('assets/img/wanita.jpg') }}" alt="User Wanita"></div>
                         @endif
                         <div class="media-body">
                            <h6 class="mt-2 user-title">{{Auth::user()->name}}</h6>
                            <p class="user-subtitle">{{Auth::user()->email}}</p>
                         </div>
                      </div>
                   </a>
                </li>
                <li class="dropdown-item" onclick="event.preventDefault();
                      document.getElementById('logout').submit();">
                      <i class="icon-power mr-2"></i> Logout
                </li>
                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>
             </ul>
          </li>
       </ul>
    </nav>
 </header>