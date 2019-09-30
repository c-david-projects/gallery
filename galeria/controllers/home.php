<?php

require("models/posts.php");

$model = new Posts();

$images = $model -> getImages();

require("views/home.php");

if ( isset($_POST["edit"]) ) {
    print_r($_POST);
    $model -> edit($_POST);
 }

?>