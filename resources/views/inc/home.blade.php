<!DOCTYPE html>
<html>
<head>
<title>Mamaland</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">

<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<link href="{{asset('css/style_css.css')}}" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<header class="main__header normal">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display --> 
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-header">
        <h1 class="navbar-brand"><a href="/">Mama<span>Land</span></a></h1>
        <a href="#" onClick="javascript.void()" class="submenu">Menus</a> </div>
      <div class="menuBar">
        <ul class="menu">
          <li class="active"><a href="/">Home</a></li>
          <li class="dropdown"><a href="/sites">Attraction sites</a>
            <ul>
              @foreach ($attractions as $attraction)
                <li><a href="/sites/{{ $attraction->id }}">{{ $attraction->name }}</a></li>
              @endforeach
             
            </ul>
          </li>
          <li class="dropdown"><a href="/hotels">Hotels</a>
            <ul>
              @foreach ($hotels as $hotel)
                <li><a href="/hotels/{{ $hotel->id }}">{{ $hotel->name }}</a></li>
              @endforeach
             
            </ul>
          </li>
          <li><a href="/news">News</a></li>
          <li><a href="/contact">contacts</a></li>
          
          @guest
          <li class="dropdown"><a href="#">Account</a>
              <ul>
                  <li><a href="/login">Login</a></li>
                  <li><a href="/register">Register</a></li>
              </ul>
          </li>
          @else
          <li><a href="/home">Dashboard</a></li>
          
          @endguest
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>

@yield('content')

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h3>About</h3>
          <p>We strive to deliver a level of service that exceeds the expectations of our customers. <br />
            <br />
            If you have any questions about our products or services, please do not hesitate to contact us. We have friendly, knowledgeable representatives available seven days a week to assist you.</p>
        </div>
        <div class="col-md-3">
          <h3>Tweets</h3>
          <p><span>Tweet</span> <a href="#">@You</a><br />
            Etiam egestas, ipsum posuere accumsan sollicitudin, nulla mauris volutpat sem, sit amet rutrum risus. </p>
          <p><span>Tweet</span> <a href="#">@You</a><br />
            Quisque porta tellus vitae adipiscing molestie. Mauris et lacus blandit, malesuada.</p>
        </div>
        <div class="col-md-3">
          <h3>Mailing list</h3>
          <p>Subscribe to our mailing list for offers, news updates and more!</p>
          <br />
          <form action="#" method="post" class="form-inline" role="form">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">your email</label>
              <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="your email">
            </div>
            <button type="submit" class="btn btn-primary btn-md">subscribe</button>
          </form>
        </div>
        <div class="col-md-3">
          <h3>Social</h3>
          <p>123 Business Way<br />
            San Francisco, CA 94108<br />
            USA<br />
            <br />
            Phone: (888) 123-4567<br />
            Fax: (887) 123-4567<br />
            <br />
          </p>
          <div class="social__icons"> <a href="#" class="socialicon socialicon-twitter"></a> <a href="#" class="socialicon socialicon-facebook"></a> <a href="#" class="socialicon socialicon-google"></a> <a href="#" class="socialicon socialicon-mail"></a> </div>
        </div>
      </div>
    </div>
  </footer>
  <p class="text-center copyright">&copy; Copyright ABC Company. All Rights Reserved.</p>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{ asset('js/bootstrap.js') }}"></script> 
  <script type="text/javascript">
  
  $('.carousel').carousel({
    interval: 3500, // in milliseconds
    pause: 'none' // set to 'true' to pause slider on mouse hover
  })
  
  </script>
  <script type="text/javascript">
  $( "a.submenu" ).click(function() {
  $( ".menuBar" ).slideToggle( "normal", function() {
  // Animation complete.
  });
  });
  $( "ul li.dropdown a" ).click(function() {
  $( "ul li.dropdown ul" ).slideToggle( "normal", function() {
  // Animation complete.
  });
  $('ul li.dropdown').toggleClass('current');
  });
  </script>
  </body>
  </html>
  