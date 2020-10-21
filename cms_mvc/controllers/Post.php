<?php

class PostController extends BaseController {

    protected function index () {
        $this->viewParams['posts'] = Posts::getAll();

        $this->loadView();
    }

    protected function detail ($params) {
        $this->viewParams['post'] = Posts::getById($params[0]);
        
        $this->loadView();
    }

    
}