<html>

<head>
    <title>App Name - CRUD('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js">
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>



    <style>
        .footer {
            /* position: sticky; */
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center; 
        }

        .cont{
            min-height: calc(100vh - 200px);
        }


        /* ----------------notification bi bell-------------------- */


        /* CSS used here will be applied after bootstrap.css */

/* .dropdown {
    display:inline-block;
    margin-left:20px;
    padding:10px;
  } */

          /* .notifications {
   min-width:420px; 
    } */ 
        
/* .dropdown-menu.divider {
  margin:5px 0;          
  } */
 

.bi-bell-fill {
   
    font-size:20px;
  }

  .dropdown-menu {
  width: 20rem;         
  }

  .notification-heading, .notification-footer  {
 	padding:2px 10px;
       }
  
  .notifications-wrapper {
     overflow:auto;
      max-height:250px;
    }
    
 .menu-title {
     color:#ff7788;
     /* font-size:1.5rem; */
      display:inline-block;
      }

      
      .bi-circle-arrow-right {
          margin-left:10px;     
        }
        

.item-title {
  
 font-size:1rem;
 color:#000;
    
}

.notifications a.content {
 text-decoration:none;
 background:#ccc;

 }
    
.notification-item {
 padding:10px;
 margin:5px;
 background:#ccc;
 border-radius:4px;
 }

 .bi-bell-fill .badge {
  position: absolute;
  top: -10px;
  right: -15px;
  padding: 2px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  font-size: 10px;
  opacity: 0.7;
}


        /* ------------------------------------------------------------ */

        
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- bootswatche theme  --}}
    {{-- <link href="{{ asset('css/theme2.css') }}" rel="stylesheet">   --}}


</head>

<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>        

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                                <li class="nav-item">
                                     <a class="nav-link" href="{{ route('contact-us') }}">{{ __('contact-us') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('forms.index') }}">{{ __('Forms') }}</a>
                                </li>


                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                          {{ Auth::user()->name }}
                                    </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                      {{-- ----------------------notification ------------------------- --}}

                      {{-- <li class="dropdown">
                        <i class="bi bi-bell-fill " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         
                        </i>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> --}}


                    @if ( auth::user()->is_admin && Auth::User()->unreadNotifications->count() >= 1 )

                    <li class="nav-item dropdown">
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                            {{-- get the number of notification sent to auth user ( retrive the notifications by notifiable_id field ) --}}
                          <i class="bi bi-bell-fill"><span class="badge">{{ Auth::User()->unreadNotifications->count()}}</span></i>
                          
                        </a>

                       
                        
                        <ul class="dropdown-menu dropdown-menu-right text-right notifications" role="menu" aria-labelledby="dLabel">
                          
                          <div class="notification-heading"><h4 class="menu-title">Notifications</h4> <a href="{{ route('markasread')}}" class="menu-title pull-right"><h5>Mark All As Read</h5><i class="bi bi-circle-arrow-right"></i></a></div>

                          {{-- <div class="notification-heading"></div> --}}
                          
                          <li class="divider"></li>
                         <div class="notifications-wrapper">
                           
                            {{-- retrive all notifications sent to auth user ( retrive the notifications by notifiable_id field ) --}}
                            @foreach (Auth::User()->unreadNotifications as $notification)

                            <a class="content" href="{{ route('forms.show', $notification->data['form_id']) }}">
                             <div class="notification-item">
                              <h4 class="item-title">Student <span style="color :blue ; font-size : 1.5rem">  {{$notification->data['form_name']}}  </span>  was Added {{$notification->created_at->diffForHumans()}} ago</h4>
                              <p class="item-info">By Mr.{{$notification->data['user_created'] }} </p>
                            </div>
                          </a>

                          @endforeach
                      
                         </div>
                          <li class="divider"></li>
                          <div class="notification-footer"><h4 class="menu-title">View all<i class="bi bi-circle-arrow-right"></i></h4></div>
                        </ul>
                        
                    </li>

                    @endif

                   {{-- ----------------------------------------------- --}}
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


    @section('sidebar') 
    <br/><br/><br/>
    @show

    <div class="container cont">
            @yield('content')
    </div>

    </body>
    

    <div class="footer bg-primary text-white">
        <br>
            <h4>---- School Management ----- </h4>
        <br>    



</html>