<?php
    require_once "config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];


    $conn = new mysqli($hn,$un,$pw,$db);

    if($conn->connect_error){
        $res["status"] = "error";
        $res["status_message"] = "MySQL connection error";
    }
    else{
        
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
   
    if($stmt->execute()){
        $result = $stmt->get_result();
        $rows = $result->num_rows;

        if($rows >= 1){
            foreach($result as $item){
                if(password_verify($password, $item['password'])){
                    session_start();
                    $_SESSION['firstName'] = $item['firstName'];
                    $_SESSION['lastName'] = $item['lastName'];
                    $_SESSION['email'] = $item['email'];
                    $_SESSION['username'] = $item['username'];
                    $_SESSION['id'] = $item['ID'];
                    $_SESSION['auth'] = true;

                    $res['status'] = 'success';
                    $res['firstName'] = $item['firstName'];
                    $res['lastName'] = $item['lastName'];
                    $res['email'] = $item['email'];
                    $res['username'] = $item['username'];
                    $res['id'] = $item['ID'];
                    $res['session'] = session_id();
                    $res['auth'] = true;
                }else{
                    $res['status'] = 'error';
                    $res['status_message'] = 'Incorrect password!';
                }
            }
        }else{
            $res['status'] = 'error';
            $res['status_message'] = 'No user found!';
        }
        $stmt->close();
        $conn->close();
    }else{
        $res["status"] = "error";
         $res["status_message"] = $stmt->error;
        }
    }

    echo json_encode($res);
    

?>