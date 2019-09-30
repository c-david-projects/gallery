<?php

require("models/posts.php");

$model = new Posts();

$images = $model -> getImages();

if ( isset($_POST["send"]) ) {
   $model -> createImage($_POST);
}

require("views/posts.php");

?>