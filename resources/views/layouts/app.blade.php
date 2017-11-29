<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Contractor Compliance </title>
    @if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
    <!-- pdf  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css') }}">
    @endif
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Form Wizard -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.steps.css') }}">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">

   <style type="text/css">
       body {
        font-family: 'Lato' ;
        
       }
   </style>

   
   
</head>
<body id="app-layout">
  
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo-contractor" src="{{ asset('/img/logo/logo.png') }}" > 
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guard('user')->user())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @elseif(Auth::guard('admin')->user())
                    <li><a href="{{ url('/admin/home') }}">Applications</a></li>
                    <li><a href="{{ url('/admin/clients') }}">Clients</a></li>
                    <li><a href="{{ url('/admin/home/contractors') }}">Contractors</a></li>
                    <li><a href="{{ url('/admin/reports') }}">Reports</a></li>
                    @endif
                    <!-- Authentication Links -->
                    @if(Auth::guard('admin')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/account') }}"><i class="fa fa-btn fa-user"></i>Account</a></li>
                                <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @elseif(Auth::guard('client')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('client')->user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                <li><a href="{{ url('/client/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @elseif(Auth::guard('user')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/account') }}"><i class="fa fa-btn fa-user"></i>Account</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @elseif(Request::segment(1) != 'login' && Request::segment(1) != 'admin' && Request::segment(1) != 'client')
                        <li><a href="{{ url('/login') }}">Login User</a></li>
                        <li><a href="{{ url('/register') }}">Register User</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    
    <!-- JavaScripts : Bootstrap + Jquery + Bootstrap-select  + Jquery-validate + Datatables  -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('/js/app.js') }}"></script>
   
    @if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
    <!-- Jquery steps -->
    <script type="text/javascript"  src=" {{asset('js/jquery.steps.js') }} "></script>
    <!--wizard initialization-->
    <script src="{{ asset('/js/jquery.wizard-init.js') }}" type="text/javascript"></script>
    @endif
    <!-- remove duplicate title pdf -->
    <script type="text/javascript" src="{{ asset('js/remove-duplicate-title-pdf.js') }}"></script>
    
   
    
    <!-- Check new app or update -->
    <script type="text/javascript" src="{{ asset('/js/check-new-update-app.js') }}"></script>

    <!-- Scroll up -->
    <script type="text/javascript" src=" {{ asset('/js/scrollUp.js') }} "></script>
   <!-- Requirement inputs management -->
   <script type="text/javascript" src="{{ asset('/js/requirement.js') }}"></script>
   <!-- Notifications -->
   <script type="text/javascript" src="{{ asset('/js/notifications.js') }}"></script>
   
   <!-- Moment.js-->  
   <script type="text/javascript" src="{{ asset('/js/moment.min.js') }}"></script>
 
   <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
   

   <!--Employees Details -->
    <script src="{{ asset('/js/employees-details.js') }}" type="text/javascript"></script>
    <!--SubContractors Details -->
    <script src="{{ asset('/js/subcontractors-details.js') }}" type="text/javascript"></script>

   <script type="text/javascript" src=" {{ asset('js/datetimepicker.js') }} "></script>

   <script type="text/javascript" src=" {{asset('js/filesInputs.js')}}  "></script>
    @stack('scripts')
   
</body>
</html>
