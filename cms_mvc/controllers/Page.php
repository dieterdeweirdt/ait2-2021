<?php

class PageController extends BaseController {

    protected function index ($params = []) {
        
        $this->viewParams['all_pages'] = Page::getAll();
        $this->viewParams['current_page'] = Page::getById($params[0]);
        $this->loadView();
    }

}