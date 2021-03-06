@extends('common.layout')

@section('content')
<img style="width:180px; padding-right:100px;cursor:pointer;" class="pull-right" src="https://d30ta5c6zg0jma.cloudfront.net/temp/jar.png" onclick="alert('Donation sent. Thanks for turning your setback into positive change!'); window.location.href='http://cruk2.appol.is/';"/>

<h1>My Setbacks</h1>

<p><a class="btn btn-large btn-primary" href="#" id="fbShare">Brag on Facebook</a></p>

@if(empty($failures))
    <p>You haven't failed yet! Good job! But if you ever do, your misgivings will be converted to good things!</p>
@else
<p>Yes, you had a setback. But don't worry! It's all for a good cause!</p>

<ul>
@foreach ($failures as $fail)
    <?php
    $objDateTime = new DateTime($fail->created_at);
    ?>
    <li><b>{{ $objDateTime->format('m-d-Y H:i') }}</b> ({{ $fail->description }}) Change: $ {{ $fail->penalty_per_misses }}</li>
    <?php $sum += $fail->penalty_per_misses; ?>
@endforeach
</ul>

<p>You have donated ${{ $sum }} so far</p>

@endif


<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({appId: '652666494755155', status: true, cookie: true, xfbml: true});
        FB.Canvas.scrollTo(0,0);
    };

    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());


    $(document).ready(function() {

    });
</script>

@stop