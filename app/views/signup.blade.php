@extends('common.layout')


@section('content')

<BR><BR>


<h2>User Sign Up Page</h2>


{{ Form::open(array('url' => 'signup')) }}

<!-- firstName field -->
<p>
    {{ Form::label('first_name', 'First Name') }}<br/>
    {{ Form::text('first_name') }}
</p>

<!-- lastName field -->
<p>
    {{ Form::label('last_name', 'Last Name') }}<br/>
    {{ Form::text('last_name') }}
</p>

<!-- email field -->
<p>
    {{ Form::label('email_address', 'Email') }}<br/>
    {{ Form::email('email_address', '', array('style' => 'width:250px')) }}
</p>



<!-- submit button -->
<p>{{ Form::submit('Sign Up', array('class' => 'btn btn-success btn-lg')) }}</p>

{{ Form::close() }}

@stop