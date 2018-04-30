<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 9/10/2017
 * Time: 12:09 PM
 */


require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';



function createUserInfo()
{
    $info = new UserInfo();
    $info->setFirstName($_POST["first_name"]);
    $info->setLastName($_POST["last_name"]);
    $info->setPhonenum($_POST["phonenum"]);
    $info->setAddress($_POST["addres"]);
    $info->setState($_POST["state"]);
    $info->setCity($_POST["city"]);
    $info->setZipcode($_POST["zip_code"]);
    $info->setEmail($_POST["email"]);
    $info->save();
        return $info;
}




if(isset($_POST['add_mentor']) || isset($_POST['delete_mentor']))
{

    if(isset($_POST['id'])) {
        $query = MentorQuery::create()->findOneById($_POST['id']);
        if(isset($_POST['delete_mentor']))
        {
            $query->delete();

            header('Location: index.php');
            die();
        }
    }
    else
        $query = new Mentor();

    $query->setCategorie($_POST["categorie_id"]);
    $query->setMentorId($_POST["mentor_id"]);
    $query->setUserInfo(createUserInfo());
    $query->setUsername($_POST["user_name"]);
    $query->setPassword($_POST["password"]);
    $query->save();

    header('Location: table.php?customers=true&view=true');




}
else if(isset($_POST['add_customer']) || isset($_POST['delete_customer']))
{

    if(isset($_POST['id'])) {
        $query = CustomerQuery::create()->findOneById($_POST['id']);
        if(isset($_POST['delete_position']))
        {
            $query->delete();

            header('index.php');
            die();
        }
    }
    else
        $query = new Customer();
    $query->setCat($_POST["categorie_id"]);
    $query->setMen($_POST["mentor_id"]);
    $query->setUserInfo(createUserInfo());
    $query->setUsername($_POST["user_name"]);
    $query->setPassword($_POST["password"]);
    $query->save();
    header('index.php');


}
else if (isset($_POST['add_administrator']) || isset($_POST['delete_administrator']))
{

    if(isset($_POST['id'])) {
        $query = AdministratorQuery::create()->findOneById($_POST['id']);
        if(isset($_POST['delete_mentor']))
        {
            $query->delete();

            header('Location: index.php');
            die();
        }
    }
    else
        $query = new Administrator();


    $query->setUserInfo(createUserInfo());
    $query->setUsername($_POST["user_name"]);
    $query->setPassword($_POST["password"]);
    $query->save();

    header('Location: table.php?customers=true&view=true');

}
else if (isset($_POST['add_categorie']) || isset($_POST['delete_categorie']))
{
    if(isset($_POST['id'])) {
        $query = CategorieQuery::create()->findOneById($_POST['id']);
        if(isset($_POST['delete_categorie']))
        {
            $query->delete();

            header('Location: table.php?categories=true&view=true');
            die();
        }
    }
    else
        $query = new Categorie();
    $query->setName($_POST['name']);
    $query->setDescription('description');
    $query->save();
    header('Location: table.php?categories=true&view=true');

}

else if(isset($_POST['add_quesiton']) || isset($_POST['delete_question']))
{   if(isset($_POST['id'])) {
    $query = QuestionsQuery::create()->findOneById($_POST['id']);
    if(isset($_POST['delete_supplier']))
    {
        $query->delete();

        header('Location: table.php?suppliers=true&view=true');
        die();
    }
}
else
    $query = new Questions();
    $query->setQuestion($_POST["question"]);
    $query->setCategoryId($_POST["categorie"]);
    $query->setDatecreated(date("Y-m-d h:i:sa"));
    $query->save();
    header('Location: table.php?suppliers=true&view=true');

}
else if(isset($_POST['add_answer']) || isset($_POST['delete_answer']))
{   if(isset($_POST['id'])) {
    $query = AnsweredQuestionsQuery::create()->findOneById($_POST['id']);
    if(isset($_POST['delete_answer']))
    {
        $query->delete();


        die();
    }
}
else
    $query = new Questions();
    $query->setQuestion($_POST["question"]);
    $query->setCategoryId($_POST["categorie"]);
    $query->setDatecreated(date("Y-m-d h:i:sa"));
    $query->save();
    header('Location: table.php?suppliers=true&view=true');

}
else if(isset($_POST['add_schedule']) || isset($_POST['delete_schedule']))
{   if(isset($_POST['id'])) {
    $query = AnsweredQuestionsQuery::create()->findOneById($_POST['id']);
    if(isset($_POST['delete_answer']))
    {
        $query->delete();


        die();
    }
}
else
    $query = new Questions();
    $query->setQuestion($_POST["question"]);
    $query->setCategoryId($_POST["categorie"]);
    $query->setDatecreated(date("Y-m-d h:i:sa"));
    $query->save();
    header('Location: table.php?suppliers=true&view=true');

}





?>
