<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/adminlte.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/select2.js') }}" defer></script>
    <script src="{{ asset('js/js/jquery.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}" defer></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--  --}}
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">

    <link href="{{ asset('css/skin-blue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
 
    
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>Lnd</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mama</b>Land</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="max-height:50px;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="user-footer">
                <div class="pull-right ">
                                      
                  <a class="btn btn-success btn-lg text-white" style="margin-right:20px; margin-top:2px;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              
              </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>        
        <li><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="/sites"><i class="fa fa-eye"></i> <span>Attraction Sites</span></a></li>
        {{-- <li class="header">LABELS</li> --}}
        <li><a href="/hotels"><i class="fa fa-bed text-red"></i> <span>Hotels</span></a></li>
        @if (Auth::user()->role=='hotel_manager')
        @if (empty($hotel))
        <li><a class=" bg-green-active" href="/hotels/create"><i class="fa fa-circle-o text-aqua"></i> <span>Create Hotel</span></a></li>            
        @else
        <li><a class=" bg-green-active" href="/hotels/{{ $hotel->id }}"><i class="fa fa-circle-o text-aqua"></i> <span>{{ $hotel->name }}</span></a></li>

        @endif

        @endif

        @if (Auth::user()->role=='admin')
        @if (empty($hotel))
        <li><a class=" bg-green-active" href="/hotels/create"><i class="fa fa-circle-o text-aqua"></i> <span>Create Hotel</span></a></li>            
        @else
        <li><a class=" bg-green-active" href="/hotels/{{ $hotel->id }}"><i class="fa fa-circle-o text-aqua"></i> <span>{{ $hotel->name }}</span></a></li>
<br>
        @endif

        @endif


        @if (Auth::user()->role=='site_manager')
        @if (empty($site))
        <li><a class="" href="/sites/create"><i class="fa fa-circle-o text-aqua"></i> <span>Create Attraction</span></a></li>

        @else
          <li><a class=" bg-green-active" href="/sites/{{ $site->id }}"><i class="fa fa-send text-aqua"></i> <span>{{ $site->name }}</span></a></li>

        @endif
        

        @endif
        @if (Auth::user()->role=='admin')
        @if (!empty($site))
          <li><a class=" bg-green-active" href="/sites/{{ $site->id }}"><i class="fa fa-send text-aqua"></i> <span>{{ $site->name }}</span></a></li>
        @else
          <li><a class="" href="/sites/create"><i class="fa fa-circle-o text-aqua"></i> <span>Create Attraction</span></a></li>

        @endif
        <li><a class="" href="/home/news"><i class="fa fa-book text-aqua"></i> <span>Create News</span></a></li>
        

        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      <small>{{ Auth::user()->name }}</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">
        @include('inc.message')
        @yield('content')
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
<script>
    // alert('thid');
    $(document).ready(function(){
      $('.select2').select2();
      
      var n_adult = document.form_1.n_adult.value;
      var n_child = document.form_1.n_child.value;
      var child = document.form_1.citizen_child.value;
      var adult = document.form_1.citizen_adult.value;
      var duration = 1;
      $('#nationality').change('focusin', function(){
        nationality = parseInt($(this).val());
        if (nationality==1) {
          child = document.form_1.citizen_child.value;
          adult = document.form_1.citizen_adult.value;
        }else if(nationality==2){
          child = document.form_1.resident_child.value;
          adult = document.form_1.resident_adult.value;
        }else if(nationality==3){
          child = document.form_1.non_resident_child.value;
          adult = document.form_1.non_resident_adult.value;
        }
        child_amount =n_child*child;
        adult_amount = n_adult*adult;
          $('#min-amount').val('$'+((adult_amount+child_amount)*duration).toFixed(2));
      });
              
        // alert(child+'_'+adult);
        $('#child').change('focusin', function(){
        n_child = parseInt($(this).val());
        child_amount =n_child*child;
        adult_amount = n_adult*adult;
          $('#min-amount').val('$'+((adult_amount+child_amount)*duration).toFixed(2));
        });

        $('#adult').change('focusin', function(){
        n_adult = parseInt($(this).val());
        adult_amount = n_adult*adult;
        child_amount =n_child*child;
          $('#min-amount').val('$'+((adult_amount+child_amount)*duration).toFixed(2));
        });
        $('#duration').change('focusin', function(){
          duration = parseInt($(this).val());
        child_amount =n_child*child;
        adult_amount = n_adult*adult;
          $('#min-amount').val('$'+((adult_amount+child_amount)*duration).toFixed(2));
        });
      
    });
</script>