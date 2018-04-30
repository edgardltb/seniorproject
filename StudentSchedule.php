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



$customer=CustomerQuery::create()->findOneByCustomerId( $_GET["id"]);
$isMentor=false;
if($_SESSION['mentor']) {
    $isMentor = true;
    $mentor = MentorQuery::create()->findOneByMentorId($_SESSION['mentorid']);


}


$customer = CustomerQuery::create()->findOneByCustomerId($_GET['id']);

if($customer->getSchedules() !== null)
    $schedules = $customer->getSchedules();





    $answered_quesitons = $customer->getAnsweredQuestionss();
    $questions= QuestionsQuery::create()->find();







/*foreach($mentorid as $row)
{


}*/

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
        <link href="video/video.js/dist/video-js.min.css" rel="stylesheet">
        <link href="video/css/videojs.record.css" rel="stylesheet">
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

        <div class="container">
            <div class="row">



                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h2 class="panel-title"> Welcome to
                                        <?php echo $customer->getUserInfo()->getFirstName()." ".$customer->getUserInfo()->getLastName() ?> </h2>
                                    <h3 class="panel-title">
                                        <?php echo $isMentor == true ? $customer->getUserInfo()->getFirstName()." Scheduled Interview" : "My Scheduled Interviews" ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th class="hidden-xs">ID</th>
                                        <th>Mentor</th>
                                        <th>Name</th>
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

                                                <a class="btn btn-danger deleteAns " name="delete_schedule"><em class="fa fa-trash"></em></a>
                                            </td>

                                            <td>
                                                <?php print $row->getCustomerId() ?>
                                            </td>

                                            <td>
                                                <?php print $row->getMentor()->getUserInfo()->getFirstName() ;?>
                                            </td>
                                            <td>
                                                <?php print $row->getMentor()->getUserInfo()->getLastName() ;?>
                                            </td>
                                            <td>
                                                <?php print $row->getMentor()->getUserInfo()->getEmail(); ?>
                                            </td>
                                            <td>
                                                <?php print  $row->getStartTime()->format('m-d-Y H:i');?>
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
                                    <h3 class="panel-title">Answered Questions</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th><em class="fa fa-cog"></em></th>
                                        <th class="hidden-xs">Category</th>
                                        <th>Questions</th>
                                        <th>Response</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                        foreach ($answered_quesitons as $row)
                        {


                            ?>



                                        <tr value="<?php print $row->getId()?>" class="quest">
                                            <td align="center">
                                                <!-- Button trigger modal -->



                                                <a class="btn btn-danger deleteAns" name="delete_answer"><em class="fa fa-trash"></em></a>

                                            </td>
                                            <td>
                                                <?php print $row->getQuestions()->getCategory()->getName()?>
                                            </td>
                                            <td>
                                                <?php print $row->getQuestions()->getQuestion() ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary res" data-toggle="modal" data-answerid="<?php print $row->getId() ?> " data-target="#ansResponse">
                                            <em class="fa fa-black-tie"></em>
                                        </button>
                                            </td>
                                            <!--                                <form>-->
                                            <!--                                    <td>-->
                                            <!--                                    <textarea cols="50" rows="4" name="link"></textarea>-->
                                            <!--                                    <input type="submit" value="Submit">-->
                                            <!--                                    </td>-->
                                            <!--                                </form>-->
                                            <!--                                <td ><audio id="myAudio" class="video-js vjs-default-skin"></audio></td>-->








                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
            <?php if(!$isMentor) {?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title">Questions</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>

                                        <th class="hidden-xs">Category</th>
                                        <th>Questions</th>
                                        <th>Response</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                        foreach ($questions as $row)
                        {


                            ?>



                                        <tr value=<?php print $row->getQuestionId()?> class="quest">

                                            <td>
                                                <?php print $row->getCategory()->getName() ?>
                                            </td>

                                            <td>
                                                <?php print $row->getQuestion()?>
                                            </td>




                                            <td>
                                                <button class="btn btn-default respond" data-toggle="modal" data-target="#audioDialog" data-id="<?php echo $row->getQuestionId()?>" data-questionid="<?php echo $row->getQuestionId()?>" data-customerid="<?php echo $_GET['id'];?>">
                                        <em class="fa fa-microphone"></em>
                                    </button>

                                                <button class="btn btn-default respond" data-id="<?php print $row->getQuestionId()?>" data-questionid="<?php print $row->getQuestionId()?>" data-customerid="<?php print $_GET['id'];?>" data-toggle="modal" data-target="#videoDialog">
                                        <em class="fa fa-black-tie"></em>
                                    </button>










                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="ansResponse" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>

                    <div class="modal-body">

                        <video id="video1" controls="" autoplay=""></video>

                        <div class="form-group " id="mentorRespond">
                            <label for="exampleFormControlTextarea1">Respond To Question</label>
                            <textarea id="respondText" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="modalClose" data-dismiss="modal">
                    Close
                </button>
                        <button type="button" id="modalAnswerSave" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="videoDialog" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>

                    <div class="modal-body">

                        <td><video id="myVideo" class="video-js vjs-default-skin"></video></td>

                        <div class="form-group " id="mentorRespond">
                            <label for="exampleFormControlTextarea1">Respond To Question</label>
                            <textarea id="respondText" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="videoClose" data-dismiss="modal">
                    Close
                </button>
                        <button type="button" id="videoSave" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="audioDialog" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>

                    <div class="modal-body">

                        <td><audio id="myAudio" class="video-js vjs-default-skin"></audio></td>

                        <div class="form-group " id="mentorRespond">
                            <label for="exampleFormControlTextarea1">Respond To Question</label>
                            <textarea id="respondText" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="modalClose" data-dismiss="modal">
                    Close
                </button>
                        <button type="button" id="audioSave" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>



        <script src="assets/js/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>


        <script src="video/video.js/dist/video.min.js"></script>
        <script src="video/recordrtc/RecordRTC.js"></script>
        <script src="video/webrtc-adapter/out/adapter.js"></script>
        <script src="video/wavesurfer.js/dist/wavesurfer.min.js"></script>
        <script src="video/wavesurfer.js/dist/plugin/wavesurfer.microphone.min.js"></script>
        <script src="video/videojs-wavesurfer/dist/videojs.wavesurfer.min.js"></script>

        <script src="video/videojs.record.js"></script>

        <script src="video/fine-uploader/fine-uploader/fine-uploader.js"></script>
        <script src="assets/js/schedule.js"></script>

    </body>

    </html>
