<?php
    session_start();
    require("../db/db.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $nrc = $_POST["nrc"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $statement = $db->prepare("INSERT INTO students(name, email, nrc, address, dob, phone_no, registered_at)
    VALUES(:name, :email, :nrc, :dob, :address, :phone, NOW() )");

    $statement->execute([
        ":name" => $name,
        ":email" => $email ?? '',
        ":nrc" => $nrc,
        ":dob" => $dob,
        ":address" => $address,
        ":phone" => $phone,
    ]);
    $_SESSION['registered'] = true;

    $id =$db->lastInsertId();

    header("location: ../index.php". "?enrolled=$id");

    ?>