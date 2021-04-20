<?php
    include './elements/header.php';

    if (isset($_SESSION['id'], $_SESSION['username'])) {
        header("location: ./chat.php");
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] === '1') {
            echo "<div id='error_problem'>Password (et/ou) username incorrect!</div>";
        } else if ($_GET['error'] === '2') {
            echo '<div id="error_problem">Un problème est survenu!</div>';
        }
    }

?>

    <div id="login_div">
        <div id="welcome_div">
            <h2>Welcome</h2>
            to your registration
        </div>
        <form id="register_new" method="post" action="../new_register.php?error=0">
            <div id="username_password_div">
                <input type="text" name="username" placeholder="username" required maxlength="45">
                <input type="password" name="password" placeholder="password" required maxlength="45">
            </div>
            <div id="login_button_div">
                <button type="submit">Register!</button>
                <button id="back" onclick="document.location.href='index.php'">Back</button>
            </div>
        </form>

    </div>

<?php
    include './elements/footer.php';
?>