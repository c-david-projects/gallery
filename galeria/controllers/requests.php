<?php

require("models/posts.php");

$model = new Posts();

if(isset($_POST["post_id"])) {
    $status = $model -> deletePost($_POST["post_id"]);
 }

?>