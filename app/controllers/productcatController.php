<?php
class productcatController{

    public function _construct()
    {
    }

    public function indexAction(){
        $name = "PHP Productcat";
        return view('index', array('name'=>$name));
    }

    public function editAction(){
        $name = "PHP Edit";
        return view('index', array('name'=>$name));
    }
}