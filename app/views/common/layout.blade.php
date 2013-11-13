<HTML>
<HEAD><title>CRUK 2</title></HEAD>

<BODY>

<b>CRUK 2: </b>


<a href="{{ route('IndexPage') }}">Home</a>

@if(Auth::check())




        Welcome {{ Auth::user()->first_name }}


<a href='{{ route('mychallenges') }}'><span class="glyphicon glyphicon-log-out"></span> My Challenges</a>
<a href='{{ route('myfailures') }}'><span class="glyphicon glyphicon-log-out"></span> My failures</a>
<a href='{{ route('logout') }}'><span class="glyphicon glyphicon-log-out"></span> Logout</a>


@else


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