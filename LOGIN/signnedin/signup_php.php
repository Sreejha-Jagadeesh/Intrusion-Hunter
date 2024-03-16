<?php
$server_name="localhost";
$username="root";
$password="krish1312";
$database_name="signup";


$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $email = $_POST['email'];
	 $pwd = $_POST['pwd'];

	 $sql_query = "INSERT INTO signup (email,pwd)
	 VALUES ('$email','$pwd')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		include 'signedup.html';
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>