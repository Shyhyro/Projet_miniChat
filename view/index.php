<?php
    include './elements/header.php';

    if (isset($_SESSION['id'], $_SESSION['username'])) {
        header("location: ./chat.php");
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] === '1') {
            echo "<div id='error_problem' class='orange'>Password (et/ou) username incorrect!</div>";
        } else if ($_GET['error'] === '2') {
            echo '<div id="error_problem" class="red">Un problème est survenu!</div>';
        } else if ($_GET['error'] === '3') {
            echo '<div id="error_problem" class="green">Account validate!</div>';
        }
    }

?>

    <div id="login_div">
        <div id="welcome_div">
            <h2>Welcome</h2>
            to your private chat
        </div>
        <form id="index_login" method="post" action="../login.php?error=0">
            <div id="username_password_div">
                <input type="text" name="username" placeholder="username" required maxlength="45">
                <input type="password" name="password" placeholder="password" required maxlength="45">
            </div>
            <div id="login_button_div">
                <button id="register" onclick="document.location.href='register.php'">Register</button>
                <button type="submit">Log in!</button>
            </div>
        </form>

    </div>

<?php
    include './elements/footer.php';
?>