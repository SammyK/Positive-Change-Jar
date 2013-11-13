@extends('common.layout')


@section('content')
<h1>My Fail Log</h1>

@if(empty($failures))
    <p>You haven't failed yet! Good job! But if you ever do, your misgivings will be converted to good things!</p>
@else
<p>Yeah, you've failed. But don't worry! It's all for a good cause!</p>

<ul>
@foreach ($failures as $fail)
    <li><b>{{ $fail->created_at }}</b> ({{ $fail->description }}) Change: U$ {{ $fail->penalty_per_misses }}</li>
    <?php $sum += $fail->penalty_per_misses; ?>
@foreach ($failures as $fail)

<?php

$objDateTime = new DateTime($fail->created_at);

?>

<p>
<li><b>{{$fail->name }}</b> at {{ $objDateTime->format('m-d-Y H:i') }}<BR>Penalty: U$ {{ $fail->penalty_per_misses }}</li>
</p>
<?php $sum += $fail->penalty_per_misses; ?>
@endforeach
</ul>

<p>You have donated U$ {{ $sum }} so far</p>
@endif

@stop