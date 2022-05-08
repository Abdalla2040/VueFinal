<?php
    require_once "config.php";
   // $res = array();
    $session = $_POST['session'];
    session_id($session);
    session_start();
    $auth = $_SESSION['auth'];
    $id = null;
    $userID = $_SESSION['id'];
    $projectName = $_POST["projectName"];
    $projectDescription = $_POST["projectDescription"];
   
    if($auth){
        $conn = new mysqli($hn,$un,$pw,$db);

        if($conn->connect_error){
            $res["status"] = "error";
            $res["status_message"] = "MySQL connection error";
        }
        else{
            
        $stmt = $conn->prepare('INSERT INTO projects VALUES(?,?,?)');
        $stmt->bind_param('iss',$id, $projectName, $projectDescription);
    
        if($stmt->execute()){
            $res["status"] = "success";
            
        }else{
            $res["status"] = "error";
            $res["status_message"] = $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }else{
        $res["status"] = "error";
        $res["status_message"] = 'Not Authenticated';
    }
    echo json_encode($res);

    
    

?>