<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once '/../vendor/autoload.php';

require_once '/../generated-conf/config.php';







function customerTable( $sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phone</th><th scope='col'>Membership</th><th scope='col'>Username</th></tr></thead> <tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='customers' class='rowClick'>";

        echo "<th >" . $row->getId() . "</th id = $row-->> <th>" . $row->getName() . "</th> <th> " . $row->getPhone() . "</th> <th>" . $row->getMembership() . "</th> <th>" . $row->getUserName() . "</th>";
        echo "</tr>";


    }
    echo"</tbody></table>";
}

function employeeTable($sql)
{
    echo "<table class='table table-hover col-2'>";



    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>City</th><th scope='col'>State</th><th scope='col'>Position</th><th scope='col'>Salary</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='employees' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th> <th> " . $row->getCity() . "</th> <th>" . $row->getState() . "</th> <th>" . $row->getPosition()->getName() . "</th>
				<th>" . $row->getSalary() . "</th> ";
        echo "</tr>";

    }
    echo"</tbody></table>";
}

function itemsTable($sql)
{
    echo "<form action=\"#\" method=\"post\" class=\"form\" >";
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th><th scope='col'>Price</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='item' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th><th> " . $row->getDescription() . "</th> <th>" . $row->getPrice() . "</th>";
        echo "</tr>";

    }
    echo "</tbody></table>";
    echo "<div class=\"form-group\"><input type=\"submit\" value=\"add customer\" name=\"add_Item\"></div>
      </form>";
}
function itemsCheck($sql)
{

    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>Check</th><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th><th scope='col'>Categorie</th><th scope='col'>Price</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='item' >";
        echo "<th><input type='checkbox' name='items[]' value='$row->getId()'></th>"+"<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th> <th>" . $row->get() . "</th><th> " . $row->getDescription() . "</th> <th>" . $row->getPrice() . "</th>";
        echo "</tr>";

    }
    echo"</tbody></table>";
}


function suppliersTable($sql)
{
    echo "<table class='table table-hover col-2'>";


    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phone</th><th scope='col'>City</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='supplier' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th><th> " . $row->getPhone() . "</th> <th>" . $row->getCity() . "</th>";
        echo "</tr>";
    }
    echo"</tbody></table>";
}
function suppliersCheck($sql)
{
    echo "<table class='table table-hover col-2'>";


    echo "<thead><tr><th scope='col'>Check</th><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Phone</th><th scope='col'>City</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr  data=" . $row->getID() . " name='supplier'>";
        echo "<th class='notselect'><input type='checkbox' name='items[]' value='".$row->getId()."'></th><th>" . $row->getName() . "</th><th> " . $row->getPhone() . "</th> <th>" . $row->getCity() . "</th>";
        echo "</tr>";
    }
    echo"</tbody></table>";
}

function categoriesTable($sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='category' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th><th> " . $row->getDescription() . "</th>";
        echo "</tr>";
    }
    echo"</tbody></table>";
}

function positionsTable($sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th><th scope='col'>Description</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='position' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th><th> " . $row->getDescription() . "</th>";
        echo "</tr>";
    }
    echo"</tbody></table>";
}

function storesTable($sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Phone</th><th scope='col'>Lcation</th><th scope='col'>Address</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='stores' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getPhone() . "</th><th> " . $row->getLocation() . "</th><th> " . $row->getAddress() . "</th>";
        echo "</tr>";
    }
    echo"</tbody></table>";
}

function areasTable($sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Name</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='areas' class='rowClick'>";
        echo "<th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th>";
        echo "</tr>";
    };
    echo"</tbody></table>";
}
function areasCheck($sql)
{
    echo "<table class='table table-hover col-2'>";

    echo "<thead><tr><th scope='col'>check</th><th scope='col'>ID</th><th scope='col'>Name</th></tr></thead><tbody>";
    foreach ($sql as $row) {
        echo "<tr data=" . $row->getID() . " name='areas'>";
        echo "<th class='notselect'><input type='checkbox' name='items[]' value='".$row->getId()."'></th><th>" . $row->getId() . "</th> <th>" . $row->getName() . "</th>";
        echo "</tr>";
    };
    echo"</tbody></table>";
}

?>



