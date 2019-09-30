<?php

require("base.php");

class Users extends Base 
{

    public function login($data){

        if(!empty($data["username"]) && !empty($data["password"])){

            $query = $this->db->prepare("
            
            SELECT user_id,password
            FROM users
            WHERE username = ?
            
            ");

            $query->execute([
                $data["username"]
            ]);

            $user = $query -> fetchAll(PDO::FETCH_ASSOC);

            if(!empty($user) &&  
            password_verify($data["password"], $user[0]["password"])
            ){
                $_SESSION["user_id"] = $user[0]["user_id"];
                return true;
            }
            else{
                return false;
            }
        }

    }

    public function register($data) {

        if( 
            !empty($data["username"])&&
            !empty($data["email"])&&
            !empty($data["password"])&&
            $data["password"] === $data["rep_password"] &&
            mb_strlen($data["username"]) > 2 &&
            mb_strlen($data["username"]) <= 32 &&
            mb_strlen($data["password"]) > 4 &&
            mb_strlen($data["password"]) <= 1000 &&
            filter_var($data["email"], FILTER_VALIDATE_EMAIL)
        ){

            echo "tudo bem";

            $query = $this->db->prepare("
            
            INSERT INTO users
            (username,email,password)
            VALUES(?,?,?)
            ");
            $query->execute([
                $data["username"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT)
            ]);
            return true;
        }
        else{
            return false;
        }
        
    }
}
?>