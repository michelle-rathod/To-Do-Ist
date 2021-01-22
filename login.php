<?php      
include('connection.php');
session_start();  
$username = $_POST['Username'];  
$password = $_POST['Password'];  

$username = stripcslashes($username);  
$password = stripcslashes($password);  
$username = mysqli_real_escape_string($con, $username);  
$password = mysqli_real_escape_string($con, $password);  

$sql = "select id from login where username = '$username' and password = '$password'";  
$result = mysqli_query($con, $sql);  

if(mysqli_num_rows($result) == 1){  
    //echo "<h1><center> Login successful </center></h1>";
	$row = $result->fetch_assoc();
	$id= $row["id"];
	$_SESSION['id'] = $id;
	header("Location:main.php");
}  
else{  
	echo "<h1> Login failed. Invalid username or password.</h1>"; 
	//header( 'Location: index.html') ;
}
?>  
