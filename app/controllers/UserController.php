<?php

class UserController extends BaseController {


    public function listUsers()
    {

        $Users = User::all();


        //Data for the content of the view
        $data_view = array('users' => $Users);


        return View::make('listusers',$data_view);

    }


}