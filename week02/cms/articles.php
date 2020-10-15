<?php
require 'app.php';

$articles = Article::getAll();

print_r( $articles );