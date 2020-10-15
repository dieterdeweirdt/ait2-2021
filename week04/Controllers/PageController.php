<?php 
class PageController {
    public function __construct () {

    }

    public function index() {
        echo 'Show all pages';
    }

    public function edit($params = []) {
        echo 'Show page ' . $params['id'];
    }

    public function delete($params = []) {
        echo 'Delete page ' . $params['id'];
    }
}