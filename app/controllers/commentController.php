<?php
class commentController{

    public function _construct()
    {
    }

    public function indexAction(){
        $name = "PHP Comment";
        return view('index', array('name' => $name));
    }
}