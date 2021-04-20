<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    DB::getInstance();

    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $n_user = "INSERT INTO minichat.user (username, password) VALUES ($username, $new_password)";


    header("location: ./view/index.php?error=3");

} else {

    header("location: ./view/register.php?error=2");
}

//password_hash($password, PASSWORD_BCRYPT);