@extends('common.layout')


@section('content')

<h3>My challenges</h3>

@foreach ($challenges as $challenge)

<b>{{$challenge->name }}</b> ({{ $challenge->description }})
    {{ Form::open(array('route' => 'postFailure')) }}

    {{ Form::hidden('user', Auth::user()->id) }}
    {{ Form::hidden('challenge', $challenge->id) }}

    <!-- submit button -->
    {{ Form::submit('Ops, I did it again - Penalty: U$ ' . $challenge->penalty_per_misses , array('class' => 'btn btn-success btn-lg')) }}</p>

    {{ Form::close() }}

    <?php
    $world_sum_sql = DB::select('select sum(c.penalty_per_misses) as total
                               from challenges c, user_fails_challenges fc
                               where c.id = fc.challenge_id
                               AND c.id = ?'
                               , array($challenge->id));


    $world_total = $world_sum_sql[0]->total;

    $user_sum_sql = DB::select('select sum(c.penalty_per_misses) as total
                               from challenges c, user_fails_challenges fc
                               where c.id = fc.challenge_id
                               AND c.id = ?
                               AND fc.user_id = ?'
        , array($challenge->id, Auth::user()->id));


    $user_total = $user_sum_sql[0]->total;

    ?>


    <i class="icon-thumbs-up"></i> Because of this challenge, you have already donated U$ {{ $user_total }}<BR>
    <i class="icon-globe"></i>This challenge has already helped to raise U$ {{ $world_total }} from all around the world.

<hr>

@endforeach

@stop