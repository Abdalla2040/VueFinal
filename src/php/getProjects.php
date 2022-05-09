
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "config.php";

$projects = [];

$conn = new mysqli($hn,$un,$pw,$db);
if($conn->connect_error){
    $res["status"] = "error";
    $res["status_message"] = "MySQL connection error";
}else{
    $stmt = $conn->prepare('SELECT * FROM projects');
    if($stmt->execute()){
        $result = $stmt->get_result();
        $rows = $result->num_rows;
        
        if($rows >= 1){
            foreach($result as $project){
                $projects[] = $project;
                
                
                
                
            }
            $res["projects"] = $projects;
            $res["status"] = "success";
        }else{
            $res["status"] = "error";
            $res["status_message"] = "No students found";
        }
    }else{
        $res["status"] = "error";
        $res["status_message"] = $stmt->error;
    }
    
}
$stmt->close();
$conn->close();

echo json_encode($res);

?>