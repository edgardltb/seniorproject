<?php
// include models, including the database connection
//use Propel\Runtime\ActiveQuery\Criteria;
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';




$customerid= $_GET["id"];
$categorieid=$_GET["id"];




$schedules= ScheduleQuery::create()->findByCustomerId($customerid);
$customer = CustomerQuery::create()->findByCustomerId($customerid);
$questions = QuestionsQuery::create()->findByQuestionId($customerid);
//$category = CategoryQuery::create()->findByCategorieId($categorieid);






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

<body><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">



        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h2 class="panel-title"> Welcome </h2>
                            <h3 class="panel-title"> My Scheduled Interviews</h3>
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
                                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                </td>

                                <td ><?php print $row->getCustomerId() ?></td>

                                <td><?php print $row->getMentor()->getUserInfo()->getFirstName() ;?></td>
                                <td><?php print $row->getMentor()->getUserInfo()->getLastName() ;?></td>
                                <td><?php print $row->getMentor()->getUserInfo()->getEmail(); ?></td>
                                <td><?php print  $row->getTime()->format('Y-m-d H:i');?></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div></div>
    <br>
    <br>

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
                            <th><em class="fa fa-cog"></em></th>
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



                            <tr value=<?php print $row->getQuestionId() ?> class="quest">
                                <td align="center">
                                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    <a class="btn btn-success" id="saveM"><em class="fa fa-check"></em></a>
                                </td>
                                <td ><?php print $row->getQuestionId() ?></td>

                                <td ><?php print $row->getQuestion() ?></td>
<!--                                <form>-->
<!--                                    <td>-->
<!--                                    <textarea cols="50" rows="4" name="link"></textarea>-->
<!--                                    <input type="submit" value="Submit">-->
<!--                                    </td>-->
<!--                                </form>-->
<!--                                <td ><audio id="myAudio" class="video-js vjs-default-skin"></audio></td>-->
                                <td><a class="btn btn-success btn-lg recordButton" id="saveM"><em class="fa fa-microphone"></em></a></td>


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div></div>

<div id="dialog" title"Record Answer">
<td ><audio id="myAudio" class="video-js vjs-default-skin"></audio></td>

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