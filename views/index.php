<?php
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
// session_start();
// if(isset($_SESSION['user']))
// {
// $user=  $_SESSION['user'];
// }
// else
// {
// header('Location: Login.php');
// die();
// }
// $table = 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Store Management System</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">Welcome</a> </div>
      <a class="navbar-brand navbar-right" id="logout" href="Logout.php">Logout</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->

    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="jumbotron">
          <h1>Store Management System</h1>
</div>
      </div>
    </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-md-12">
<div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
<div class="caption">
  <h3>Customers</h3>
  <p>View the Customers Attending store</p>
  <hr>
              <p class="text-center"><a href="table.php?customers=true&view=true" class="btn btn-success" role="button">Enter</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
<div class="caption">
  <h3>Stores</h3>
  <p>View and edit Stores</p>
  <hr>
              <p class="text-center"><a href="table.php?stores=true&view=true" class="btn btn-info" role="button">Enter</a></p>
</div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
          <div class="thumbnail"> &nbsp;
            <div class="caption">
              <h3>Employees</h3>
              <p>add or edit employees</p>
              <hr>
              <p class="text-center"><a href="table.php?employees=true&view=true" class="btn btn-success" role="button">Enter</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
<div class="caption">
  <h3>Receipts</h3>
  <p>Look through receipts</p>
  <hr>
              <p class="text-center"><a href="table.php?receipts=true&view=true" class="btn btn-info" role="button">Enter</a></p>
</div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
<div class="caption">
  <h3>Items</h3>
  <p>Add or Remove Items from Store</p>
  <hr>
              <p class="text-center"><a href="table.php?items=true&view=true" class="btn btn-primary btn-success" role="button">Enter</a></p>
</div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
            <div class="caption">
              <h3>Store Areas</h3>
              <p>View the store Areas</p>
              <hr>
              <p class="text-center"><a href="table.php?areas=true&view=true" class="btn btn-primary btn-success" role="button">Enter</a></p>
            </div>
          </div>
</div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
            <div class="caption">
              <h3>Employee Positions</h3>
              <p>Add store positions available for employees</p>
              <hr>
              <p class="text-center"><a href="table.php?positions=true&view=true" class="btn btn-primary btn-success" role="button">Enter</a></p>
            </div>
          </div>
        </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
              <div class="thumbnail">
                  <div class="caption">
                      <h3>Suppliers</h3>
                      <p>Suppliers that have contracts with company</p>
                      <hr>
                      <p class="text-center"><a href="table.php?suppliers=true&view=true" class="btn btn-primary btn-success" role="button">Enter</a></p>
                  </div>
              </div>
          </div>
      </div>
    </div>
      <div class="col-lg-3 col-lg-offset-0 col-md-offset-0 col-md-4">
          <div class="well">
              <h3 class="text-center">Menu</h3>
          </div>
          <div class="list-group">
              <a href="table.php" class="list-group-item <?php echo ($table == 'home' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Home</h4>
              </a>
              <a href="table.php?customers=true&view=true" class="list-group-item <?php echo ($table == 'customers' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Customer</h4>
              </a><a href="table.php?stores=true&view=true" class="list-group-item <?php echo ($table == 'stores' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Stores</h4>
              </a><a href="table.php?employees=true&view=true" class="list-group-item <?php echo ($table == 'employees' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Employees</h4>
              </a><a href="table.php?items=true&view=true" class="list-group-item <?php echo ($table == 'items' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Items</h4>
              </a><a href="table.php?positions=true&view=true" class="list-group-item <?php echo ($table == 'positions' ? ' active' : '');?>">
                  <h4 class="list-group-item-heading">Store Postions</h4>
                  <a href="table.php?orders=true" class="list-group-item <?php echo ($table == 'orders' ? ' active' : '');?>">
                      <h4 class="list-group-item-heading">Orders</h4>
                  </a><a class="list-group-item disabled">
                      <h4 class="list-group-item-heading">&nbsp;</h4>
                  </a></div>
          <hr>
          <div class="media-object-default">
              <div class="media">
                  <div class="media-left"> <a href="#">  </a> </div>
              </div>
              <div class="media">
                  <div class="media-left"> <a href="#">  </a> </div>
                  <div class="media-body">
                      <h4 class="media-heading">Adminstrator</h4>
                      <p>Phone: 9568444542</p>
                      <p><a href="mailto:#">edgardlt@gmail.com</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<hr>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © STore Management system</p>
      </div>
    </div>
  </div>
</footer>
<div class="datta"></div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
<script type="application/javascript" src="js/script.js"></script>


</body>
</html>