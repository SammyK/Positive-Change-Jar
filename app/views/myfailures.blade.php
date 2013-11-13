@extends('common.layout')


@section('content')

<h3>My Failures</h3>

@foreach ($failures as $fail)

<?php

$objDateTime = new DateTime($fail->created_at);

?>

<p>
<li><b>{{$fail->name }}</b> at {{ $objDateTime->format('m-d-Y H:i') }}<BR>Penalty: U$ {{ $fail->penalty_per_misses }}</li>
</p>
<?php $sum += $fail->penalty_per_misses; ?>
@endforeach

You have donated U$ {{ $sum }} so far

@stop