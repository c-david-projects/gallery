<?php
require("models/users.php");

$options = ["login", "register", "logout"];

if(in_array($_GET["option"], $options)) {

    $model = new Users();

    if($_GET["option"] === "register"){

        if(isset($_POST["send"])){

            $status = $model->register($_POST);


            if($status){
                header("Location:./?controller=access&option=login");
            }
        }
    }
    else if($_GET["option"] === "logout"){
        session_destroy();
        header("Location:./" );
        exit;

    }
    else if($_GET["option"] === "login"){

        if(isset($_POST["send"])){

            $status = $model->login($_POST);
            if($status){
                header("Location:./");
            }
        }
    }


    require("views/" .$_GET["option"]. ".php");
}

?>