<?php

require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';

$regularTimes= ["12:00","12:30","1:00", "1:30", "2:00", "2:30","3:00","3:30","4:00","4:30"];
$times = array();
$schedule= ScheduleQuery::create()->find();
//$schedule= Sche>duleQuery::create()-


foreach ($schedule as $t)
{

 array_push($times,$t->getStartTime()->format("H:i"));
}


echo json_encode($times);

//session_start();
?>