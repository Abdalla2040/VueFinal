<?php
    require_once "config.php";

    $id = null;
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $conn = new mysqli($hn,$un,$pw,$db);

    if($conn->connect_error){
        $res["status"] = "error";
        $res["status_message"] = "MySQL connection error";
    }
    else{
        
    $stmt = $conn->prepare('INSERT INTO users VALUES(?,?,?,?,?,?)');
    $stmt->bind_param('isssss',$id, $firstName, $lastName, $email, $username, $password);
   
    if($stmt->execute()){
        $ID = $conn->insert_id;
        $stmt->close();
        $conn->close();

        session_start();
        $_SESSION["id"] = $ID;
        $_SESSION["firstName"] = $firstName;
        $_SESSION["lastName"] = $lastName;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;
        $_SESSION["auth"] = true;

        $res["status"] = "success";
        $res["id"] = $ID;
        $res["firstName"] = $firstName;
        $res["lastName"] = $lastName;
        $res["email"] = $email;
        $res["username"] = $username;
        $res["session"] = session_id();
        $res["auth"] = true;
        

    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
        }
    }

    echo json_encode($res);
    

?>