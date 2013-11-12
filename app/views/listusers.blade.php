@extends('common.layout')


@section('content')

<BR><BR>


<h2>Users List Page</h2>

<?

/*
 * To add an user
 *
$user = new User;
$user->email_address = "test@test.com";
$user->first_name = "Teste";
$user->save();
*/



?>

@foreach ($users as $user)
 <p>
     Name: {{$user->first_name }}<BR>
     Email: {{ $user->email_address }}
</p>
@endforeach


@stop