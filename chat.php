<?php
session_start();

if (!empty($_POST["user"])) {
    if (!isset($_COOKIE["user"])) {
        setcookie("user", $_POST["user"], time() + (86400 * 30), "/"); // 86400 = 1 day
    }
    $_SESSION['user'] = $_POST["user"];
} ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        setTimeout(execute_query, 500);
    });
</script>
<?php
if (empty($_SESSION['user']))
    $_SESSION['user'] = "Anon";
?>
<html>


<script>
    let txt = "";

    local_user = "";

    function chatFunction(value, index, array) {
        txt += value + "<br>";
    }

    $.get('username.php', function(username) {
        local_user = username;
    });

    local_timestamp = "";
    $.get('timestamp.php', function(timestamp) {
        local_timestamp = timestamp;
    });

    function execute_query() {
        //console.log("MATA");

        $.ajax({
            url: 'update.php',
            method: "POST",
            data: {
                local_time: local_timestamp
            },
            dataType: "json",
            success: function(response) {
                document.getElementById("chat-div").innerHTML = txt;
                //console.log(response);
                //alert('Successfully called');
                txt = "";
                response.forEach(chatFunction);
            }
        });

        setTimeout(execute_query, 200);
    }
</script>

<body class="jumbotron" style="box-sizing:border-box;border:2px solid #969696;text-align:center;
        background-image: url(https://nova2.global/img/content-bg.png);
        background-attachment: fixed; background-size: cover; background-repeat: no-repeat;">
    <div>

        <div id="chat-div" class="border-0" style="text-align:left;color:bisque">
        </div>
        <?php
        //echo $_SESSION["timestamp"];
        ?>
        <form method="post" action="">
            <div class="form-group" style="text-align:left">
                <label for="message">
                    <h3 style="color:bisque">
                        <?php
                        if (!empty($_POST["user"])) {
                            $_SESSION['user'] = $_POST["user"];
                        }
                        echo $_COOKIE["user"] . ':'
                        ?>
                    </h3>
                </label>

                <input type="message" class="form-control" id="message" placeholder="Type a message" name="message" style="margin:auto;background-color:#3b0505;color:bisque;outline-color:#3b0505;" required autofocus>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-block" name="message_btn" style="background-image: url(https://nova2.global/img/registernow.png);
                    background-attachment: fixed; background-size: cover; background-repeat: no-repeat;color:bisque">Send Message</button>
        </form>
    </div>
</body>
<?php
$conn = pg_connect("host=20.205.115.226 dbname=apache user=apache password=apache port=5432");


if (!empty($_POST["message"])) {
    $sql = "CREATE TABLE  if not exists Messages (
        Message TEXT NOT NULL,
        Username TEXT NOT NULL,
        Timestamp timestamp default CURRENT_TIMESTAMP
      );";

    pg_query($conn, $sql);

    $sql = "insert into Messages (Message, Username) values ('" .
        $_POST["message"] . "', '" . $_COOKIE["user"] . "');";
    $result = pg_query($conn, $sql);
}
?>

</html>