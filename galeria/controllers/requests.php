<?php

require("models/posts.php");

$model = new Posts();

var_dump ($_POST["post_id"]);

if(isset($_POST["post_id"])) {
    $status = $model -> deletePost($_POST["post_id"]);
 }

?>