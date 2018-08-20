<?php
class indexController{

    public function _construct()
    {
    }

    public function indexAction(){

        $articleModel = new articleModel();
        $record = $articleModel->getRow(1);
//
//        echo"<pre>";
//        print_r($record);
//        echo"</pre>";

    exit;

        $name = "PHP MVC";
        return view('index', array('name' => $name));
    }
}