<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 4/1/2018
 * Time: 4:55 PM
 */

$room = $_GET["room"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">


    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://simplewebrtc.com/latest-v3.js"></script>
    <script  src="video.js"></script>
</head>



<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="fas fa-shipping-fast" href="#">PrepQuickly</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>

            <a class="nav-item nav-link" href="Logout">Logout</a>
        </div>
    </div>
</nav>


    <div id="room" value="<?php print $room ?>"></div>
    <video height="300" id="localVideo"></video>
    <div id="remotesVideos"></div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script  src="video.js"></script>



</div>

</body>
</html>
