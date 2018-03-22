<?php

	$nimi = filter_input(INPUT_POST, 'nimi');
	$email = filter_input(INPUT_POST, 'email');
	$paikka = filter_input(INPUT_POST, 'paikka');
	if (!empty($nimi)){
	if (!empty($email)){
	if (!empty($paikka)){
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "asiakkaat";
	
	// luo yhteys
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	
	if (mysqli_connect_error()){
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	}
	else
	{
		$sql = "INSERT INTO asiakkaat (nimi, email, paikka)
		values ('$nimi','$email','$paikka')";
		if ($conn->query($sql))
		{
			echo "Ilmoituksesi lisättiin onnistuneesti";
		}
		else
		{
			echo "Error:". $sql ."<br>". $conn->error;
		}
		$conn->close();
	}
	}
	else
	{
		echo "Paikka puuttuu";
		die();
	}
	}
	else
	{
		echo "Email puuttuu";
		die();
	}
	}	
	else
	{
		echo "Nimi puuttuu";
		die();
	}	
?>