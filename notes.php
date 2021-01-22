<?php
include('connection.php');

$title = $_POST['title'];
$note = $_POST['note'];
$query= $_POST['query'];
session_start(); 
$id=$_SESSION['id']; 
echo "$title";
echo "$note";

if($query=='ADD'){
	$sql = "INSERT INTO notes (uid,title,description) values ('$id','$title','$note')";
	mysqli_query($con, $sql);
	header( 'Location: main.php' ) ;
}
if($query=='REMOVE'){
	$sql = "DELETE from notes where (title='$title' AND description='$note' AND uid='$id')";
	mysqli_query($con, $sql);
	date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');
echo $date;
	header( 'Location: main.php' ) ;
}
if($query=='EDIT'){
	$sql = "UPDATE notes SET description='$note' where title='$title' AND uid='$id'";

	mysqli_query($con, $sql);	
	header( 'Location: main.php' ) ;
}
?>