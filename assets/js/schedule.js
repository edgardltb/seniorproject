$(".schedule").on("click", function () {

    var data = $(this).attr('value');
    var sc = $(this).attr('schedule');

    window.location.href = "interview.php?room="+data+"?schedule="+sc;

})

$(".done").on("click", function()
{


    
})
$(".question").one("click",function()
{
  $(this).find(".ans").toggle()


})

$(".question").one("click",function()
{

   $.post("insert.php", function (data) {
       
   }

    $(this).find(".ans").toggle()


})