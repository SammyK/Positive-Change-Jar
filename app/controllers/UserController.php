<?php

class UserController extends BaseController {


    public $layout = 'common.layout';


    public function listUsers()
    {

        /*$Igreons = Igreon::all();


        $this->layout->pageTitle = "Info" ;
        $this->layout->showMenu = false ;

        //Data for the content of the view
        $data_view = array('igreons' => $Igreons);

        $this->layout->content = View::make('info/igreon', $data_view);
*/


        return View::make('listusers');

    }


}