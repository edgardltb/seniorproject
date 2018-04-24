<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 4/1/2018
 * Time: 4:55 PM
 */

$room = $_GET["room"];
$room = $_GET["schedule"]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://cdn.peerjs.com/0.3/peer.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://simplewebrtc.com/latest-v2.js"></script>

    <script  src="video.js"></script>
    <link rel="stylesheet" href="style.css">
</head>



<body>

<div hidden id="room"><?php print $room ?></div>
<input type="text" id="peer">
<button type="button" id="connect"> ok</button>
<button type="button" id="done"> Done</button>


<input type="text" id="message">

<button type="button" id="ok"> Ok</button>

<div id="messagebox">
    <div id="chat"></div>


</div>
<div id = "content">

    <video id="localVideo"></video>
    <div id="remoteVideos"></div>






</div>

</body>
</html>
