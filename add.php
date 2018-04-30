


<?php if(isset($_GET['user_info']))
{
?>

    <form action="insert.php" method="post" class="form" >
        <div class="form-group"><label class="control-label col-sm-2">Phone Number: </label><input type="text" name="phonenum"  class="form-group"></div>
        <div class="form-group"><label class="control-label col-sm-2">First Name:</label> <input type="text" name="first_name" class="form-group"></div>
        <div class="form-group"><label class="control-label col-sm-2">Last Name:</label> <input type="text" name="last_name" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">Address:</label> <input type="text" name="address" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">State:</label> <input type="text" name="state" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">City:</label> <input type="text" name="city" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">Zip Code:</label> <input type="text" name="zipcode" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">User ID:</label> <input type="text" name="user_id" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">Email:</label> <input type="text" name="email" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">Username:</label> <input type="text" name="username" class="form-group"></div>
        <div class="form-group"><label  class="control-label col-sm-2">Password:</label> <input type="password" name="password" class="form-group"></div>
    </form>

<?php } elseif (isset($_GET['schedule']))
{ ?>
    <body>
    <input id="datetimepicker" type="text" >
    </body>

    <link rel="stylesheet" type="text/css" href="assets/timepicker/jquery.datetimepicker.min.css"/ >
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/timepicker/jquery.datetimepicker.full.min.js"></script>
    <script>

        $('#datetimepicker').datetimepicker({
            format:'d.m.Y H:i',
            inline:true,
            lang:'ru',
            onSelectDate: function (ct,$i) {
                var d= [];

                $.ajax({
                    url: 'test.php',
                    type: 'get',
                    data: {'day': ct.getDate(), 'month':ct.getMonth()}

                })
                    .done(function(data) {
                         d = jQuery.parseJSON(data);
                         console.debug((d));
                        $('#datetimepicker').datetimepicker('setOptions', {allowTimes: d});




                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                console.log(ct)

            }
        });
    </script>

<?php } elseif(isset($_GET['Customer']))
{ ?>

    <form action="insert.php" method="post">
        Customer ID: <input type="text" name="customer_id"><br>
        Mentor: <input type="text" name="men"><br>
        Category: <input type="text" name="cat"><br>
        User Info: <select type="text" name="user_info" class="areas">

    </form>

<?php } elseif(isset($_GET['Mentor']))
{ ?>

    <form action="insert.php" method="post">
        Mentor ID: <input type="text" name="mentor_id"><br>
        Category: <input type="text" name="categorie"><br>
        Info: <input type="text" name="info"><br>
    </form>

<?php } elseif(isset($_GET['Category']))
{ ?>

    <form action="insert.php" method="post">
        Category ID: <input type="text" name="categorie_id"><br>
        Name: <input type="text" name="name"><br>
        Description: <input type="text" name="description"><br>
    </form>


<?php } elseif(isset($_GET['Questions']))
{ ?>


    <form action="insert.php" method="post">
        Question ID: <input type="text" name="question_id"><br>
        Question: <input type="text" name="question"><br>
        Response: <input type="text" name="response"><br>
        Category ID: <input type="text" name="Category_id"><br>
        Answered: <input type="text" name="answered"><br>
        Date Created: <input type="text" name="datecreated"><br>
    </form>

<?php } elseif(isset($_GET['Administrator']))
{ ?>
    <form action="insert.php" method="post">
        Admin ID: <input type="text" name="admin_id"><br>
        User Info ID: <input type="text" name="user_info_id"><br>
    </form>
<?php } elseif(isset($_GET['Media']))
{ ?>
    <form action="insert.php" method="post">
        Media ID: <input type="text" name="Media_id"><br>
        Video: <input type="text" name="video"><br>
        Link: <input type="text" name="link"><br>
        Question ID: <input type="text" name="question_id"><br>
    </form>
<?php } elseif(isset($_GET['receipts']))
{

    require_once 'order.php';

 } ?>