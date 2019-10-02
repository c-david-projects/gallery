<?php

require("models/posts.php");

$model = new Posts();

$images = $model -> getImages();


if ( isset($_POST["edit"]) ) {
    print_r($_POST);
    $model -> edit($_POST);
}

require("views/home.php");
?>