<?php session_start();
?>

<!DOCTYPE html>
<Html lang="en">


<Head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Metin2 Marketplace chat</title>
</Head>
<?php

$conn = pg_connect("host=20.205.115.226 dbname=apache user=apache password=apache port=5432");

$result = pg_query($conn, "SELECT CURRENT_TIMESTAMP");
$row = pg_fetch_array($result);

$_SESSION["timestamp"] = $row[0];

//echo $_SESSION["timestamp"];
pg_close($conn);
?>

<body style="background-image: url(https://gf1.geo.gfsrv.net/cdnf0/fee8580ddbe56ee377ec255124091b.jpg);
        background-attachment: fixed;  background-size: cover;  background-repeat: no-repeat;">
    <br><br><br>
    <div class="row">
        <div class="col-md-2 mx-auto">
            <p><img src="https://s3.mt2classic.com/introimg/shop.png" style=" margin:auto;display: block;"></p>
        </div>

        <div class="col-md-8 mx-auto" style="text-align: center;">
            <!-- style="background-image: url(https://metin2steel.in/resurse/imagini/interfata/interfata_subiect.png);
        background-attachment: fixed;  background-size: cover;  background-repeat: no-repeat;"-->
            <p><img src="https://gf3.geo.gfsrv.net/cdnee/38208914a2c465a983efcce6791e8c.png" style=" margin:auto;display: block;"></p>
            <h3 class="display-4">
                Welcome to the Metin2 Marketplace global chat!
            </h3>
            <form method="post" action="chat.php" style="display: inline-block;">
                <div class="form-group">
                    <label for="user">Username:</label>
                    <input type="user" class="form-control" id="user" placeholder="Username" name="user" style="width:8cm;background-color:#3b0505;color:bisque;" required autofocus>
                </div>
                <br>
                <button type="submit" class="btn btn-lg btn-block" name="message_btn" style="background-image: url(https://nova2.global/img/registernow.png);
                    background-attachment: fixed; background-size: cover; background-repeat: no-repeat;color:bisque">Login</button>

            </form>
            <br><br>
            <form method="post" action="logout_chat.php">
                <button type="submit" class="btn btn-lg btn-block" name="message_btn" style="background-image: url(https://nova2.global/img/registernow.png);
                    background-attachment: fixed; background-size: cover; background-repeat: no-repeat;color:bisque">Logout</button>
            </form>
        </div>
        <div class="col-md-2 mx-auto">
            <p><img src="https://s3.mt2classic.com/introimg/shop.png" style=" margin:auto;display: block;"></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto" style="text-align: center;">
            <br>
            <br>
            <br>
            <iframe width="600" height="450" src="https://www.youtube.com/embed/ENYS7loJtJM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
        <!-- https://www.youtube.com/watch?v=IjP89xahSIM
        ?autoplay=1&mute=1
        <iframe width="420" height="315" src="https://www.youtube.com/watch?v=ENYS7loJtJM">
        </iframe> -->
    </div>
</body>

</Html>

<?php
if (!empty($_POST)) {
    //echo "HERE";
    //session_destroy();
}

?>