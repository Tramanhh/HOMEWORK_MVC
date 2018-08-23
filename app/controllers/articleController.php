<?php
class articleController {
    public function _construct()
    {
    }

    public function indexAction()
    {
        $articleModel = new articleModel();
        $articles = $articleModel->getRows();

        return view('article', 'index', array('articles' => $articles));

    }


    public function editAction(){

        $articles = "PHP Edit";
        return view('article' , 'edit', array('articles' => $articles));
    }

    public function deleteAction(){

        $articles = "PHP Delete";
        return view('article' , 'delete', array('articles' => $articles));
    }
}