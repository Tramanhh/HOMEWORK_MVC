<?php
class articleController {
    public function _construct()
    {
    }

    public function indexAction()
    {

        $articleModel = new articleModel();
        $articles = $articleModel->getRows();

        echo "<pre>";
        print_r($articles);
        echo "</pre>";
        exit;

        return view('article', 'index', array('articles' => $articles));

    }


    public function editAction(){
        $name = "PHP Edit";
        return view('article' , 'edit', array('name' => $name));
    }

    public function deleteAction(){
        $name = "PHP Delete";
        return view('article' , 'delete', array('name' => $name));
    }
}