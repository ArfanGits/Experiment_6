<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = new PDO(
    "mysql:host=localhost;dbname=user",
    'root',
    ''
);
//set the PDO error mode to exception
$conn->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);

$_email = $_POST['email'];
$_password = $_POST['password'];

$query = "SELECT COUNT(*) AS total FROM `signup` WHERE email LIKE :email AND password LIKE :password;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':password', $_password);
$result = $stmt->execute();
$totalfound = $stmt->fetch();

if($totalfound['total'] > 0){
    header("location:welcome.php");
}else{
    header("location:failed.php");
}

?>