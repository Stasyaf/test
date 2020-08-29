<?php
	
	// Устанавливаем соединение
    $dbh = "mysql:host=localhost; dbname=portfolio";
    $db = new PDO($dbh, "root", "root");

    // Задаем кодировку
    $db->exec("set names utf8");

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	$sql = "INSERT INTO orders(time, name, phone, email ) VALUES(NOW(), :name, :phone, :email)";

	$result = $db->prepare($sql);
	$result->bindParam(':name', $name, PDO::PARAM_STR);
	$result->bindParam(':phone', $phone, PDO::PARAM_STR);
	$result->bindParam(':email', $email, PDO::PARAM_STR);
	$result->execute();

	echo "1";
?>