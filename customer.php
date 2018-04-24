<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once '/vendor/autoload.php';

require_once '/generated-conf/config.php';



$customer = CustomerQuery::create()->findOneByCustomerId($_GET["id"]);
$customerInfo=$customer->getUserInfo();



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

<body><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">


        <h1><?php echo $customerInfo->getFirstName() +" " + $customerInfo->getLastName() ?></h1>



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
                            <th class="hidden-xs">ID</th>
                            <th>Question</th>
                            <th>Answered</th>

                            
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $questions = $customer->getCustomerHasQuestionss();
                        foreach ($questions as $row)
                        {
                            ?>



                        <tr>
                            <td align="center">
                                <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>

                            <td class="hidden-xs"><?php $row->getQuestions()->getQuestionId()?></td>
                            <td><?php $row->getQuestions()->getQuestion() ?></td>
                            <td><?php $row->getQuestions()->getResponse() ?></td>

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
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>