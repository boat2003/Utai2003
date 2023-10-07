<?php
session_start();
 include('server.php');

$topic = trim($_POST['topic']);
$detail = trim($_POST['detail']);
$created = date('Y-m-d H:i:s');
$userid =  $_SESSION['uid'];
 
$sql = "INSERT INTO questions (topic,detail,created,id) VALUES ('{$topic}','{$detail}','{$created}','{$userid}') ";
$query = mysqli_query($conn,$sql);
if ($query == TRUE) {
 header("location: main_webboard.php");
}
