<?php
session_start();
 unset($_SESSION["isAdmin"]);

 header("location:  ../admin.php");