<!DOCTYPE html>
<html lang="pt">
	<head>
 		<meta charset="utf-8">
      	<title>Upload de Ficheiros</title>
        <style>
        img{
            width:150px;
        }
        </style>
	</head>
    <body>
        <nav>
            <?php
             if(isset($_SESSION["user_id"])){
                 echo'
                <a href="?controller=posts">Upload</a>';
             }
            ?>
            <?php
        if(!isset($_SESSION["user_id"])){
            echo '<a href="?controller=access&option=register">Criar Nova Conta</a>
                 <a href="?controller=access&option=login">Fazer Login</a>';
        }
        else{
            echo '<a href="?controller=access&option=logout">Fazer Logout</a>';
        }
        ?>
        </nav>
        <?php


        foreach($images as $image){
            echo $image["title"];
            echo '<img alt="" src="uploads/'.$image["image"].'">';
            if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $image["user_id"] ){
                echo'<h2>Editar</h2>';
                echo'<form method="POST" action="'.$_SERVER["REQUEST_URI"].'" enctype="multipart/form-data">';
                echo'<input name="post_id" value="'.$image["post_id"].'" type="hidden">';
                echo '<div><label>Title<input type="text" value="'.$image["title"].'" name="title" required></label></div> ';
                echo'<div><label>image<input type="file" name="image" required></label></div>';
                echo'<div><button type="button" name="delete">Apagar</button></div>';
                echo'<div><button type="submit" name="edit">Concluir</button></div></form>';
            }
    }
        ?>
    </body>
</html>

