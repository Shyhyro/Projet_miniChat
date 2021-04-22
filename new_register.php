<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    $user = new UserController();
    $user = $user->logUser($username);

// Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    // If: password no have uppercase, lowercase, number, special chars and 8, no register this
    // Else : registration
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("location: ./view/register.php?error=4");
    } else{
        if($user->getId() == null) {
            $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $addUser = new UserController();
            $addUser = $addUser->addUser($username, $new_password);
            if ($addUser) {
                header("location: ./view/index.php?error=3");
            } else {
                header("location: ./view/register.php?error=2");
            }
        } else {
            header("location: ./view/register.php?error=1");
        }
    }

} else {
    header("location: ./view/register.php?error=2");
}
