<?php
session_start();

require('../db/db.php');
$email = $_POST['email'];
$password = md5($_POST['password']);

$statement = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password ");
$statement->execute([
    ":email" => $email,
    ":password" => $password,
]);

$check = $statement->fetch();

if($check) {
    $_SESSION['isAdmin'] = true;
    header("location: ../admin.php");
}else {
    unset($_SESSION['isAdmin']);
    header("location: ../admin.php". "?auth_error=1");
}

?>