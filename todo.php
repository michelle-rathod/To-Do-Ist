<?php
include('connection.php');

$tsk = $_POST['task'];
$query= $_POST['query'];
session_start(); 
$id=$_SESSION['id']; 

if($query=='ADD'){
	$sql = "INSERT INTO todos (uid,tasks) values ('$id','$tsk')";
	mysqli_query($con, $sql);
	header( 'Location: main.php' ) ;
}
if($query=='REMOVE'){
	$sql = "DELETE from todos where tasks='$tsk' AND uid='$id'";
	mysqli_query($con, $sql);
	header( 'Location: main.php' ) ;
}
?>