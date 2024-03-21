<?php

require_once "./constant/conn.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Firstname = $_POST['fname'];
    $Middlename = $_POST['Mname'];
    $Lastname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $Dirthdate = $_POST['Birt'];
    $Age = $_POST['Age'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
  
    
    try {
        $sql = "INSERT INTO users(First_Name,Middle_Name,Last_Name,Gender,Birthdate,Age,Username,Email_Address,Passwords) VALUES (:fname,:Mname,:lname,:gender,:Birt,:Age,:uname, :email, :pass)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':fname', $Firstname);
        $stmt->bindParam(':Mname', $Middlename);
        $stmt->bindParam(':lname', $Lastname);
        $stmt->bindParam(':gender', $Gender);
        $stmt->bindParam(':Birt', $Dirthdate);
        $stmt->bindParam(':Age', $Age);
        $stmt->bindParam(':uname', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $password);
        
        $stmt->execute();

        $data = array("status" => "success", "message" => "Data inserted successfully.");
        echo json_encode($data);

        $con = null;

    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
    } else{
        echo "Server error!";
    }

    
?>