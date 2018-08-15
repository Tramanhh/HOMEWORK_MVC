<?php
class indexController{

    public function _construct()
    {
    }

    public function indexAction(){

        $name = "PHP MVC";
        return view('index', array('name' => $name));
    }
}