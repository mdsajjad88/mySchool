<?php
include "dbConnec.php";
if($_POST['abid']){
    $id = $_POST['abid'];  
    $insert = $connection->prepare("INSERT INTO attendence(student_id, daily_status)VALUES ('$id', 'Absent')");
    $insert->execute();
}

?>