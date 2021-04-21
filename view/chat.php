<?php
    include './elements/header.php';

    if (isset($_SESSION['username'])) {

?>

    <div id="chat_body">
        <div id="chat_message_list">
            <div class="message_info_div">
                <div class="message_username">Username</div>
                <div class="message_date_div">
                    <div>01.01.21 / 00:00</div>
                    <div class="message_div">message txt</div>
                </div>
            </div>
            <div class="message_info_div">
                <div class="message_username">Username</div>
                <div class="message_date_div">
                    <div>01.01.21 / 00:00</div>
                    <div class="message_div">message txt</div>
                </div>
            </div>
        </div>
        <div id="chat_new_message_leave">
            <div id="chat_new_message_div">
                <form method="post">
                    <input type="text" required>
                    <button type="submit">Send</button>
                </form>
            </div>
            <div id="chat_leave_div">
                <a href="<?=$rootHtml?>/logout.php"><button>Leave</button></a>
            </div>
        </div>
    </div>

<?php
    }

include './elements/footer.php';
?>