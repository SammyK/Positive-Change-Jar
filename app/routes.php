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

// Facebook authentication endpoints
// Show FB Prompt
Route::get('login/fb', function() {
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('/login/fb/callback'),
            'scope' => 'email',
        );
        return Redirect::to($facebook->getLoginUrl($params));
});
// Process response from FB
Route::get('login/fb/callback', function() {
        $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();

        if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

        $me = $facebook->api('/me');

        //dd($me);

        $profile = Profile::whereUid($uid)->first();
        if (empty($profile)) {

            $team = new Team;
            $team->challenge_id = 100;
            $team->team_name = $me['first_name'] . ' ' . $me['last_name'];
            $team->save();

            $user = new User;
            $user->team_id = $team->id;
            $user->first_name = $me['first_name'];
            $user->last_name = $me['last_name'];
            $user->email_address = $me['email'];
            //$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

            $user->save();

            $profile = new Profile();
            $profile->uid = $uid;
            $profile->username = $me['username'];
            $profile = $user->profiles()->save($profile);
        }

        $profile->access_token = $facebook->getAccessToken();
        $profile->save();

        $user = $profile->user;

        Auth::login($user);

        return Redirect::to('/')->with('message', 'Logged in with Facebook');
});

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

    //My failures Page
    Route::get('user/failures', array('as' => 'myfailures',
            'uses' => 'UserController@myFailures')
    );

    Route::post('postFailure', array('as' => 'postFailure',
        'uses' => 'FailureController@postFailure'));


});
