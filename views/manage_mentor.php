<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once 'vendor/autoload.php';

require_once 'generated-conf/config.php';
?>

<!--    <form action="#" method="post">-->
<!--  <div class="input-group col-5">-->
<!--    <input type="text" class="form-control" placeholder="Search" name="Search ">-->
<!--    <div class="input-group-btn">-->
<!---->
<!--      <button class="btn btn-default" type="submit">-->
<!--        <i class="glyphicon glyphicon-search">Search</i>-->
<!--      </button>-->
<!---->
<!--    </div>-->
<!--  </div>-->
<!---->
<!--</form>-->



    
<?php
require_once 'search.php';
require_once 'views/view.php'; ?>

<a href="table.php?<?php echo  $table ?>=true&add=true" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Add</a>

