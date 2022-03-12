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


$_name = $_POST['name'];
$_email = $_POST['email'];
$_password = $_POST['password'];

$query = "INSERT INTO `signup` (`name`,`email`,`password`) VALUES (:name,:email,:password);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':password' => $_password
));


if ($result){
    $_SESSION['message'] = "User is added successfully";
}else{
    $_SESSION['message'] = "User is not added";
}

header("location:index.php");

return $result;

?>