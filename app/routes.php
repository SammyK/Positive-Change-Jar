<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




//Index
Route::get('/', array('as' => 'IndexPage',
        'uses' => 'HomeController@indexPage')
);

//Users list
Route::get('user/list', array('as' => 'UsersList',
        'uses' => 'UserController@listUsers')
);

//User Signup page
Route::get('signup', array('as' => 'signup',
        'uses' => 'UserController@indexSignup')
);

//User Signup
Route::post('signup', 'UserController@postSignup'
)->before('csrf');

//User login Page
Route::get('login', array('as' => 'login',
        'uses' => 'AuthController@indexLogin')
);

//User login
Route::post('login', 'AuthController@postLogin'
)->before('csrf');





Route::group(array('before' => 'auth'), function()
{

    Route::get('logout', array('as' => 'logout',
        'uses' => 'AuthController@logout'));


//My challenges Page
    Route::get('user/challenges', array('as' => 'mychallenges',
            'uses' => 'UserController@myChallenges')
    );


});