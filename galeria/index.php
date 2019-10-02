<?php

session_start();

$controllers = ["home","posts","access","requests"];
$controller = $controllers[0];

if(isset($_GET["controller"]) &&
in_array($_GET["controller"], $controllers)
){
    $controller = $_GET["controller"];
}

require("controllers/".$controller.".php");
?>