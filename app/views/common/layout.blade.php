
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cancer Research UK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
      .challenge{
        border:solid;
        float: left;
        margin:10px;
      }
      .challenge-image{
        width:60%;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <img src="assets/img/CRUK_Pos_CMYK_300.jpg" style="width:300px" class="muted"/>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
              	                <li class="active"><a href="{{ route('IndexPage') }}">Home</a></li>
              @if(Auth::check())

                <li><a href="{{ route('mychallenges') }}">Challenges</a></li>
                <li><a href="{{ route('myfailures') }}">Leaderboard</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="mailto:kar2905@gmail.com">Contact</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

<a href="{{ route('IndexPage') }}">Home</a>





        Welcome {{ Auth::user()->first_name }}


@else
<div class="row">
<a href='{{ route('signup') }}' class='btn btn-success'>Sign up</a>
<a href='{{ route('login') }}' class='btn btn-default'>Sign in</a>
</div>
@endif


<hr>

<!-- check for flash notification message -->
@if(Session::has('flash_notice'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('flash_notice') }}
</div>
@endif

<!-- check for login error flash var -->
@if (Session::has('flash_error'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('flash_error') }}
</div>
@endif

@yield('content')

</BODY>



</HTML>