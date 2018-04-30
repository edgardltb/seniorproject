<?php

require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
session_start();



if(isset($_POST['username']))
{
    if(isset($_POST["mentor"])) {
        $user = MentorQuery::create()->findOneByUsername($_POST["username"]);

        $mentor = true;
        $_SESSION['mentor'] = true;
        $_SESSION['mentorid'] = $user->getMentorId();
    }
    elseif(isset($_POST['customer']))
    {
        $user = CustomerQuery::create()->findOneByUsername($_POST["username"]);
        $mentor = false;
        $_SESSION['mentor']= false;
    }
    else {
        require 'views/login.php';
        return 0;
    }





    if($user != null && $user->getPassword() == $_POST['password'])
    {
        echo "Log in Successful";

        $_SESSION['user']=$user;
        if($mentor)
        header('Location: scheduled.php?id='.$user->getMentorId());
        else
            header('Location: StudentSchedule.php?id='.$user->getCustomerId());
    }
    else
    {
        echo "Log in Unsuccessful";
        require 'views/login.php';
    }




}
else {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($_SESSION['mentor'])
            header('Location: scheduled.php?id='.$user->getMentorId());
        else
            header('Location: StudentSchedule.php?id='.$user->getCustomerId());
    }
    else {
        require 'views/login.php';
    }


    //require 'table.php';

}