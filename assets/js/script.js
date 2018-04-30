$(".stores").ready( function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'stores'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['Stores'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Location']);
                $test.attr('value', value['Id'])
                $test.appendTo(".stores");

            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});
$(".customers").ready( function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'customers'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['Customerss'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Id']+":"+ value['Name']);
                $test.attr('value', value['Id'])
                $test.appendTo(".customers");

            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});

$(".rowClick").on('click', function (event) {

    var data = $(this).attr('data');
    var table = $(this).attr('name');
    var text="edit.php?"+table +"=true&id="+data;

    window.location.href = "table.php?"+table +"=true&id="+data +"&edit=true";



    


})
$(".categories").one('click', function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'categories'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['Categories'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Id']+":"+ value['Name']);
                $test.attr('value', value['Id'])
                $test.appendTo(".categories");

            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});
$(".items").one('click', function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'categories'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['Stores'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Location']);
                $test.attr('value', value['Id'])
                $test.appendTo(".items");

            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});
$(".suppliers").one('click', function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'suppliers'}

    })
        .done(function(data) {
            var d = JSON.parse(data);

            d= d['Suppliers'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Id']+":"+ value['Name']);
                $test.attr('value', value['Id'])
                $test.appendTo(".suppliers");

            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});

$(".areas").one('click', function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'areas'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['StoreAreas'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Id']+":"+ value['Name']);
                $test.attr('value', value['Id'])
                $test.appendTo(".areas");


            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});
$(".positions").one('click', function(event)
{

    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': 'positions'}

    })
        .done(function(data) {
            var d = JSON.parse(data);
            d= d['Positions'];
            $.each(d , function(key,value)
            {


                console.log(value['id'])
                $test= $('.select_template').first().clone(true,true);
                $test.removeClass('hidden');
                $test.val("tesstsfasdf");
                $test.text(value['Id']+":"+ value['Name']);
                $test.attr('value', value['Id'])
                $test.appendTo(".positions");


            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});


function getinfo($table)
{


    $.ajax({
        url: 'get.php',
        type: 'get',
        data: {'table': $table}

    })
        .done(function(data) {
             d = JSON.parse(data);
             getarr(d);



        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

}
var d;
function getarr(s) {
    d=s;

}

$(".datta").ready( function (event)
{

    var t= 'stores';
    var data=getinfo(t);


    var colum = ['Id', 'Name', 'Description'];

    $ta = $(".testing").clone(true);
    $.each(colum,function(key,value){
        $ta.find($(".theading")).append("<th>"+value+"</th>");
    });

    $.each(data,function(key,value){
        $row= $ta.find($(".tr")).first().clone(true);
        $row.attr('data',value['Id']);
        $.each(value,function (key,v) {
            $row.append("<th>"+v+"</th>");
        });
        $ta.append($row);
    })

});











