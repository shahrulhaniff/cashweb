<?php
include "../server.php";


   // Retrieve the posted data
   $json    =  file_get_contents('php://input');
   $obj     =  json_decode($json);



      // Add a new user
     

         // Sanitise URL supplied values
         $name 	  = filter_var($obj->name, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $email	  = filter_var($obj->email, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $telnum = filter_var($obj->telnum, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $user	  = filter_var($obj->user, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

         // Attempt to run PDO prepared statement
         try {
            $sql 	= "UPDATE maklumat_pengguna SET nama = :name, email = :email, no_telefon = :telnum WHERE ic_pengguna = :user";
            $stmt 	= $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':telnum', $telnum, PDO::PARAM_STR);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->execute();
            //echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
			
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

?>