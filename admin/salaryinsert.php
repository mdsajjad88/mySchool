<?php
error_reporting(0);
include "dbConnec.php";
if(isset($_POST['myData'])){
    $id = $_POST["myData"];

    $sel = $connection->prepare("SELECT * FROM salarysheet WHERE teacher_id = '$id'");
    $sel->execute();
    $cnnt = $sel->rowCount();
    if($cnnt > 0){
        echo "<b class='alert alert-warning text-dark form-control'>Already inserted this Employee Salary</b>";
    }
    else{
        $select = $connection->prepare("SELECT * FROM teacher_regi WHERE id = '$id'");
    $select->execute(); 
    $row = $select->fetch(PDO::FETCH_ASSOC);
     echo $row['teacher_name'];
    }
    
}


?>