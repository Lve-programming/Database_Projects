<?php
    include('function.php');
    include("layout/header.php");

    try {    
        $username   = $_POST['username'];
        $mobile     = $_POST['mobile'];
        $password   = $_POST['password'];
        $rePassword = $_POST['re_password'];
    
       $query ="INSERT INTO users SET user_name=? ,phone_number=? ,password=?";
    
       if (empty_check($username) or empty_check($mobile) or empty_check($password) 
       or empty_check($rePassword) ) {
            header('Location: ../register-form.php?empty'); 
        }
        else if(mobile_check($mobile)) {
            header('Location: ../register-form.php?mobile'); 
        }
        elseif(pass_chek($password,$rePassword)){
            header('Location: ../register-form.php?rePass'); 
        }
        else {
                
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1,$username);
            $stmt->bindValue(2,$mobile);
            $stmt->bindValue(3,$password);
    
        $result = $stmt->execute();    
            if ($result) {
                header('Location: ../register-form.php?userok'); 
            }
            
            }
        
        
    } catch (PDOException $e) {
        echo "Error Message:". $e->getMessage()."  In:". $e->getFile()."code=".$e->getCode();
        if ($e->getCode() == "23000") {
                header('Location: ../register-form.php?userexist');
            }
    }