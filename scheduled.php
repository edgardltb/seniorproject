<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
session_start();

if(isset($_SESSION['user']))
{
    $user= $_SESSION['user'];
}
else
{
    header('Location: Login.php');
    die();
}


$mentorid= $_SESSION['mentorid'];

$schedules= ScheduleQuery::create()->findByMentorId($mentorid);

$students = CustomerQuery::create()->findByMen($mentorid);








?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Untitled</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
        <link rel="stylesheet" href="assets/css/MUSA_panel-table1.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="fas fa-shipping-fast" href="#">PrepQuickly</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link " href="Logout.php">Logout</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron ">
            <h1 class="display-3">Welcome</h1>


        </div>
        <div class="container">
            <div class="row">



                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title">Scheduled Interviews</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th class="hidden-xs">ID</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th>Email</th>
                                        <th>Scheduled Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                        foreach ($schedules as $row)
                        {
                            ?>



                                        <tr value="<?php print $row->getRoom() ?>" class="schedule" schedule=<?php print $row->getScheduleId() ?>>
                                            <td align="center">
                                                <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                                <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                            </td>

                                            <td>
                                                <?php print $row->getCustomerId() ?>
                                            </td>

                                            <td>
                                                <?php print $row->getCustomer()->getUserInfo()->getFirstName() ;?>
                                            </td>
                                            <td>
                                                <?php print $row->getCustomer()->getUserInfo()->getLastName() ;?>
                                            </td>
                                            <td>
                                                <?php print $row->getCustomer()->getUserInfo()->getEmail(); ?>
                                            </td>
                                            <td>
                                                <?php print  $row->getStartTime()->format('Y-m-d H:i');?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title">Students</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th class="hidden-xs">ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                        foreach ($students as $row)
                        {

                            ?>



                                        <tr value=<?php $row->getCustomerId() ?> >
                                            <td align="center">
                                                <a class="btn btn-default student active" href="StudentSchedule.php?id=<?php print $row->getCustomerId() ?>"><em class="fa fa-pencil" ></em></a>
                                                <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                            </td>
                                            <td>
                                                <?php print $row->getCustomerId()?>
                                            </td>

                                            <td>
                                                <?php print $row->getUserInfo()->getFirstName() ?>
                                            </td>
                                            <td>
                                                <?php print $row->getUserInfo()->getLastName() ?>
                                            </td>
                                            <td>
                                                <?php print $row->getUserInfo()->getEmail()?>
                                            </td>
                                            < </tr>

                                                <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/schedule.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>



    </body>

    </html>
