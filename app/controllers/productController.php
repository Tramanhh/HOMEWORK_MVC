<?php
class productController{

    public function _construct(){
    }

    public function indexAction(){
        $name = "PHP Product";
        return view('index', array('name'=>$name));
    }

    public function editAction(){
        $name = "PHP Edit";
        return view('index', array('name'=>$name));
    }
}