<?php

class ArticleController extends BaseController {

    protected function index () {
        $this->viewParams['articles'] = Article::getAll();
        $this->loadView();
    }

    protected function detail ($params = []) {

        $article = Article::getById($params[0]);
        
        if(isset($params[0])) {
            
            if($article->article_id) {
                $this->viewParams['article'] = $article;
                $this->loadView();
            }
            else {
                //redirect to home
                $this->redirect('/article');
            }
        }
        else {
            //redirect to home
            $this->redirect('/article');
        }
        
    }
}