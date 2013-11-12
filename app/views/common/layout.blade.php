<HTML>
<HEAD><title>CRUK 2</title></HEAD>

<BODY>

<b>CRUK 2: </b>


<a href="{{ route('IndexPage') }}">Home</a>

@if(Auth::check())



    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='padding-top: 5px; padding-bottom: 0px;'>
        {{ Auth::user()->first_name }} </a>


        <a href='#'><span class="glyphicon glyphicon-user"></span> Profile</a>
        <a href='#'><span class="glyphicon glyphicon-log-out"></span> Logout</a>


@else

<a href='{{ route('signup') }}' class='btn btn-success'>Sign up</a>
<a href='{{ route('login') }}' class='btn btn-default'>Sign in</a>

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