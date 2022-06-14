<?php
if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $username = $_POST["username"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    changeUser($conn, $email, $username);
}

else {
    header("location: ../profile.php");
    exit();
}