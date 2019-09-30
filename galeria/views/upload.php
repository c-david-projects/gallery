<!DOCTYPE html>
<html lang="pt">
	<head>
 		<meta charset="utf-8">
      	<title>Upload de Ficheiros</title>
	</head>
	 	<body>
	 		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                <div>
                    <label>
                        image
                        <input type="file" name="image" required>
                    </label>
                </div>
                <label>
                titulo do topico
                <input type="text" name="title" required>
                </label>
                <div>
                    <button type="submit" name="send">Enviar</button>
                </div>
            </form>
	    </body>
</html>