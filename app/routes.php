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
