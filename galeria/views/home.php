<!DOCTYPE html>
<html lang="pt">
	<head>
 		<meta charset="utf-8">
      	<title>Upload de Ficheiros ayyaya</title>
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
                echo'<div><button type="button" id="btn" class="" data-post_id="'.$image["post_id"].'" name="delete">Apagar</button></div>';
                echo'<div><button type="submit" name="edit">Concluir</button></div></form>';
            }
    }
        ?>

         <script
			  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>

    $("#btn").click(function(e) {
                e.preventDefault();
                console.log("teste");
                const post_id = e.target.getAttribute("data-post_id");
        $.ajax({
            type: "POST",
            url: "?controller=requests",
            data: { 
                "post_id":post_id
            },
            success: function(result) {
                alert('ok');
            },
            error: function(result) {
                alert('error');
            }
        });
});
    



        </script>
    </body>
</html>

