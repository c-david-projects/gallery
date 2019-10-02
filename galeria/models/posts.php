<?php

require("base.php");

class Posts extends Base {

    public function getImages(){
        $query = $this->db->prepare("

        SELECT post_id, title, parent_id, image, user_id
        FROM posts
        WHERE parent_id = 0
        ");

        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function createImage($data){
        $allowed_types = [
            "jpg" => "image/jpeg",
            "png" => "image/png"
        ];

        if(
            isset($_FILES["image"]) &&
            $_FILES["image"]["size"] > 0 &&
            $_FILES["image"]["error"] === 0 &&
            in_array($_FILES["image"]["type"], $allowed_types)&&
            isset($_SESSION["user_id"])

        ){
            $file_extension = array_search($_FILES["image"]["type"],$allowed_types);
            $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

            // $user_id = 1;

            $query = $this->db->prepare("
                INSERT INTO posts (title, parent_id, user_id, image)
                VALUES (?, 0, ?, ?)
            ");

            $query->execute([
                $data["title"],
                $_SESSION["user_id"],
                $filename
            ]);

            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$filename);
      }

      }

      public function edit($data) {
        $allowed_types = [
            "jpg" => "image/jpeg",
            "png" => "image/png"
        ];

        if(
            isset($_FILES["image"]) &&
            $_FILES["image"]["size"] > 0 &&
            $_FILES["image"]["error"] === 0 &&
            in_array($_FILES["image"]["type"], $allowed_types) &&
            isset($_SESSION["user_id"])
        ){
            $file_extension = array_search($_FILES["image"]["type"], $allowed_types);
            $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

            $query = $this->db->prepare("
                UPDATE posts
                SET title = ?, image = ?
                WHERE post_id = ?
                AND user_id = ?
            ");

            $result = $query->execute([
                $data["title"],
                $filename,
                $data["post_id"],
                $_SESSION["user_id"]
            ]);

            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$filename);
        }

    }

    public function deletePost($postId) {

            $query = $this->db->prepare("

                DELETE FROM posts
                WHERE post_id = ?
                AND user_id = ?
            ");

            $result = $query->execute([
                $postId,
                $_SESSION["user_id"]
            ]);
        }

    }

?>

