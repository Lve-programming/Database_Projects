<?php
//require_once("../includes/DataBase.php");
require_once('function.php');
include("layout/header.php");
        try {
            $key = $_POST['key'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users 
            WHERE (user_name = :key OR email = :key OR phone_number = :key)
            AND (password = :password)";

            if(empty_check($key) or empty_check($password)){
                header("Location:../login-form.php?empty");
            }else{
                
            $stmt = $conn->prepare($query);
            $stmt->bindvalue(":key",$key);
            $stmt->bindvalue(":password",$password);


            $stmt->execute();
            $result = $stmt->rowCount();
            //$user = $stmt->fetch_all();
            if($result){
                foreach($stmt as $user){
             
                   $_SESSION['user'] = [
                       'id' => $user['id'],
                        'first_name' => $user['first_name'],
                       'user_name' => $user['user_name'],
                       'email' =>$user['email']
                     ];
             header("Location:../login-form.php?hasuser");     
            
            }   
            }else{
                header("Location:../login-form.php?nouser");                
            }
            }
            
        } catch (Exception $e) {
            echo "ERROR MESSAGE: ". $e->getMessage();
        }

   ?>