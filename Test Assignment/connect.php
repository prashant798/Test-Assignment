<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $number = $_POST['number'];
    $designation = $_POST['designation'];
	$gender = $_POST['gender'];

	$hobbies = $_POST['hobbies'];

	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, birthday, number, designation, gender, hobbies) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisss", $firstName, $lastName, $email, $birthday,  $number, $designation, $gender, $hobbies);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>