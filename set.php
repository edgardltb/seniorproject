<?php
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';


if(isset($_POST["addQuestion"]))
{

    $question = QuestionsQuery::create()->findOneByQuestionId($_POST["id"]);


    $question->setAnswered(true);

    $question->setResponse($_POST["file"]);

    $question->save();

}
