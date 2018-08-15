<?php
class articleController {
    public function _construct()
    {
    }

    public function indexAction(){
        $name = "PHP Article";
        return view('index', array('name' => $name));
    }

    public function editAction(){
        $name = "PHP Edit";
        return view('index', array('name' => $name));
    }
}