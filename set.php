<?php
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
session_start();

if(isset($_POST["ans_question"]))
{

    $question = AnsweredQuestionsQuery::create()->findbyId($_POST['id']);


   $question->responded(true);

    $question->response($_POST["text"]);

    $question->save();
    echo json_encode(array('success' => true));
}
elseif (isset($_POST['add_media']))
{
    $media = new Media();
    $custom= new Questions();

    $media->setLink($_POST['media']);

    $question= QuestionsQuery::create()->findOneByQuestionId($_POST['questionid']);

    $answeredQuestion= new AnsweredQuestions();
    $answeredQuestion->setCustomerId($_POST['customerid']);
    $answeredQuestion->setQuestionId($_POST['questionid']);
    $answeredQuestion->setMedia($media);
    $media->save();
    $answeredQuestion->save();
    echo json_encode(array('success' => true));


}
if(isset($_POST["answered_question"]))
{
    $t= (int) $_POST['id'];

    $q = AnsweredQuestionsQuery::create()->findOneById($_POST['id']);

    $media=$q->getMedia();

    $mediaid= $media->getLink();
    echo json_encode($mediaid);
}
