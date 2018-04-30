<?php
// include models, including the database connection
use Propel\Runtime\ActiveQuery\Criteria;
require_once 'vendor/autoload.php';



require_once 'generated-conf/config.php';


if(isset($_GET['table'])) {

    if ($_GET['table'] == 'stores')
    {
          $data= StoreQuery::create()->find();
          //  echo json_encode($data->toArray());
        $data= $data->toJSON();
          echo $data;



    }
    elseif ($_GET['table'] == 'categories')
    {
        $data= CategorieQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }
    elseif ($_GET['table'] == 'items')
    {
        $data= ItemQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }
    elseif ($_GET['table'] == 'areas')
    {
        $data= StoreAreaQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }
    elseif ($_GET['table'] == 'suppliers')
    {
        $data= SupplierQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }
    elseif ($_GET['table'] == 'positions')
    {
        $data= PositionQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }
    elseif ($_GET['table'] == 'customers')
    {
        $data= CustomersQuery::create()->find();

        $data= $data->toJSON();
        echo $data;



    }


}else
    echo json_encode(['name'=> 'test']) ;

