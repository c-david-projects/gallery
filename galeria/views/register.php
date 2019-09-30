<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Criar Conta</title>
</head>
<body>
    <?php
    
    if(isset($status) && $status === false) {
        echo "<p>Preencha os campos correctamente</p>";
    }
    
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
    <div>
        <label>
            Username
            <input type="text" name="username" required>
        </label>
     </div>
     <div>
        <label>
            Email
            <input type="email" name="email" required>
        </label>
    </div>
    <div>
        <label>
            Password
            <input type="password" name="password" required>
        </label>
    </div>
    <div>
        <label>
            Repetir Password
            <input type="password" name="rep_password" required>
        </label>
    </div>
    <div>
        <button type="submit" name="send">Registar</button>
    </div>
    </form>
 </body>
</html>