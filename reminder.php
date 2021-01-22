<?php
include('connection.php');

$reminder = $_POST['Reminder'];
$dd = $_POST['DD'];
$mm = $_POST['MM'];
$yy = $_POST['YY'];
$query= $_POST['query'];
session_start(); 
$id=$_SESSION['id']; 
if($query=='ADD'){
	$sql = "INSERT INTO reminders (uid,dd,mm,yy,reminder) values ('$id','$dd','$mm','$yy','$reminder')";
	mysqli_query($con, $sql);
	header( 'Location: main.php' ) ;
}
if($query=='REMOVE'){
	$sql = "DELETE from reminders where reminder='$reminder' AND dd='$dd' AND mm='$mm' AND yy='$yy'";
	mysqli_query($con, $sql);
	header( 'Location: main.php' ) ;
}
?>