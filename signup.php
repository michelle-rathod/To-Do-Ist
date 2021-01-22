<?php      
include('connection.php');  
session_start();
$username = $_POST['Username'];  
$password = $_POST['Password']; 
$email = $_POST['Email']; 
$username = stripcslashes($username);  
$password = stripcslashes($password);  
$email = stripcslashes($email);  
$username = mysqli_real_escape_string($con, $username);  
$password = mysqli_real_escape_string($con, $password);  
$email = mysqli_real_escape_string($con, $email); 
echo "$email";

$sql="SELECT username from login where username='$username'";
$result = mysqli_query($con, $sql);   

if(mysqli_num_rows($result)>0)
{
	echo "<h1><center> already exists choose another Username </center></h1>";
}
else
{
	$sql = "INSERT INTO login (username,password,email) values ('$username', '$password','$email')";
	mysqli_query($con, $sql); 
	$row = mysqli_query($con,"select id from login where username = '$username' and password = '$password'")->fetch_assoc();
	$id= $row["id"];
	$_SESSION['id'] = $id;
	header("Location:main.php");
} 
?>  