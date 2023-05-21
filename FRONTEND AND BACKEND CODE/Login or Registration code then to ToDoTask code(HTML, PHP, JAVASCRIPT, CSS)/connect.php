<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Database connection
    $conn = new mysqli('localhost','root','','user_db');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(username, email, password)
            values(?, ?, ?)");
        $stmt->bind_param("sss",$username, $email, $hashedPassword);
        $stmt->execute();
        echo "Registration Successfully!";
        echo "<br/>";
        echo "Go Back to Login.";
        $stmt->close();
        $conn->close();        
    }


?>