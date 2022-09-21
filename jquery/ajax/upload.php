<?php 

//$conn = mysqli_connect("localhost", "root", "", "demo");  
if(isset($_POST["name"]))  
{  
	$name = $_POST["name"]; 
	$email = $_POST["email"];  	
	$message = $_POST["message"];  
	$query = "INSERT INTO user_form(name, email, message) VALUES ('".$name."','".$email."','".$message."')";  
	//if(mysqli_query($conn, $query))  
	//{  
        echo "<p>La consulta es $query</p>";
	   echo '<p>You have entered</p>';  
	   echo '<p>Name:'.$name.'</p>';  
	   echo '<p>Email:'.$email.'</p>';  
	   echo '<p>Message : '.$message.'</p>';  
	//}  
}  
?>