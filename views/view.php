<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once '/../vendor/autoload.php';

require_once '/../generated-conf/config.php';





echo "<table class='table table-hover col-2'>";


if(isset($_GET['customers']))
{

    if(!empty($_POST))
    {
        $sql = CustomerQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
	    $sql = CustomerQuery::create()->find();








    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>First Name</th><th scope='col'>Last Name</th><th scope='col'>Phone</th><th scope='col'>Username</th></tr></thead> <tbody>";
    foreach($sql as $row ){

        $tmp= new UserInfo();
        $tmp= $row->getUserInfo();




        echo "<tr data=".$row->getId()." name='customers' class='rowClick'>";



        echo "<th >" .$tmp->getFirstName() ."</th> <th>" .$tmp->getLastName(). "</th> <th> " .$tmp->getPhonenum(). "</th> <th>" .$membership. "</th> <th>" .$tmp->getUsername(). "</th>";
        echo "</tr>";


    }

}
else if(isset($_GET['employees']))
{
    if(!empty($_POST))
    {
        $sql = EmployeeQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = EmployeeQuery::create()->find();

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>City</th><th scope='col'>State</th><th scope='col'>Position</th><th scope='col'>Salary</th></tr></thead><tbody>";
   foreach($sql as $row) {
       echo "<tr data=".$row->getID()." name='employees' class='rowClick'>";
       echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th> <th> " . $row->getCity() . "</th> <th>" . $row->getState() . "</th> <th>" . $row->getPosition()->getName() . "</th>
				<th>" . $row->getSalary() . "</th> ";
       echo "</tr>";

   }

}
else if(isset($_GET['items']))
{
    if(!empty($_POST))
    {
        $sql = ItemQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = ItemQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th><th scope='col'>Categorie</th><th scope='col'>Supplier</th><th scope='col'>Price</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='items' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getName(). "</th><th> " .$row->getDescription(). "</th><th> " .$row->getCategorie()->getName(). "</th><th> " .$row->getSupplier()->getName(). "</th> <th>" .$row->getPrice(). "</th>";
        echo "</tr>";

    }

}
else if(isset($_GET['suppliers']))
{
    if(!empty($_POST))
    {
        $sql = SupplierQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = SupplierQuery::create()->find();

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phone</th><th scope='col'>City</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='suppliers' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getName(). "</th><th> " .$row->getPhone(). "</th> <th>".$row->getCity()."</th>";
        echo "</tr>";
    }


}
else if(isset($_GET['categories']))
{
    if(!empty($_POST))
    {
        $sql = CategorieQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = CategorieQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='category' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getName(). "</th><th> " .$row->getDescription(). "</th>";
        echo "</tr>";
    }


}
else if(isset($_GET['positions']))
{
    if(!empty($_POST))
    {
        $sql = PositionQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = PositionQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='positions' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getName(). "</th><th> " .$row->getDescription(). "</th>";
        echo "</tr>";
    }


}
else if(isset($_GET['stores']))
{
    if(!empty($_POST))
    {
        $sql = StoreQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = StoreQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Phone</th><th scope='col'>Lcation</th><th scope='col'>Address</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='stores' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getPhone(). "</th><th> " .$row->getLocation()."</th><th> " .$row->getAddress(). "</th>";
        echo "</tr>";
    }


}
else if(isset($_GET['areas']))
{
    if(!empty($_POST))
    {
        $sql = StoreAreaQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);

    }
    else
        $sql = StoreAreaQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='areas' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th> <th>" . $row->getName(). "</th>";
        echo "</tr>";
    }
    ;

}
else if(isset($_GET['receipts']))
{
    if(!empty($_POST))
    {
        $sql = ReceiptQuery::create()->filterBy(ucwords($_POST['term']),$_POST['search'],Criteria::LIKE);;

    }
    else
        $sql = ReceiptQuery::create()->find();
    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Total</th></tr></thead><tbody>";
    foreach($sql as $row ){
        echo "<tr data=".$row->getID()." name='receipts' class='rowClick'>";
        echo "<th>" .$row->getId(). "</th>";
        echo "<th>" .$row->getTotal(). "</th>";
        echo "</tr>";
    }
    ;

}


echo"</tbody></table>";



?>
