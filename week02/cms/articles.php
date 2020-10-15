<?php

require 'db.php';
require 'models/BaseModel.php';
require 'models/Article.php';

print_r( Article::getAll() );