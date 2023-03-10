<?php
session_start();

unset($_SESSION["registered"]);

header("location: ../index.php");

?>