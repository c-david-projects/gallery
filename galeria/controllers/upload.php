<?php

// public function createImage(){
//   $allowed_types = [
//       "jpg" => "image/jpeg",
//       "png" => "image/png"
//   ];

//   if(
//       isset($_SESSION["user_id"]) &&
//       isset($_FILES["image"]) &&
//       $_FILES["image"]["size"] > 0 &&
//       $_FILES["image"]["error"] === 0 &&
//       in_array($_FILES["image"]["type"], $allowed_types)

//   ){
//       $file_extension = array_search($_FILES["image"]["type"],$allowed_types);
//       $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

//       $query = $this->db->prepare("
//           INSERT INTO posts (title,post_date,parent_id,user_id,image)
//           VALUES (?,?,?,?'".$filename."')
//       ");

//       $query->execute([
//       ]);

//       move_uploaded_file($_FILES["image"]["uploads"], "post_uploads/".$filename);
// }

// }


