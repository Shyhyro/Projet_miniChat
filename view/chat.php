<?php
    include './elements/header.php';

    if (isset($_SESSION['username'])) {

        $messages = new MessageController();
        $messages = $messages->getMessage();

?>

    <div id="chat_body">
        <div id="chat_message_list"></div>
        <div id="chat_new_message_leave">
            <div id="chat_new_message_div">
                <form>
                    <input type="text" required name="message" minlength="1" id="new_message_input">
                    <button id="new_message_button">Send</button>
                </form>
            </div>
            <div id="chat_leave_div">
                <a href="<?=$rootHtml?>/logout.php"><button>Leave</button></a>
            </div>
        </div>
    </div>

<?php
    }
    ?>
<script src="./scripts/ajax.js"></script>
<?php
    include './elements/footer.php';
?>