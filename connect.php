<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('webserver1.c5outkkl1tmc.ap-south-1.rds.amazonaws.com','admin','admin123','webserver');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
  </head>
  <body>
<div class="container signin">
    <p>Already have an account? with us<a href="https://google.com" >Sign in</a>.</p>
 
</div>
</body>
</html>
