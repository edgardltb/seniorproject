
var global=this;
var answeredQuestionid=0;

function onAnswered(object)
{
    answeredQuestionid = object;
}

$(".res").on('click',function (object) {
    var parent= $(this).parents("tr");
    var t=$(this).data('answerid');

    $.ajax({
        url: 'set.php',
        type: 'post',
        async: false,
        data: {"answered_question": true, 'id' : t }

    })
        .done(function(data) {


              answeredQuestionid  = JSON.parse(data);

              $("$ansResponse").dataset.mediaid = answeredQuestionid;



        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });



})

$(".deleteAns").on("click",function () {
    var parent= $(this).parents("tr");






    $.ajax({
        url: 'insert.php',
        type: 'post',
        data: {'delete_answer': true, 'id': parent.attr("value") }

    })
        .done(function(data) {

            parent.remove();





        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });


});

$(".schedule").on("click", function () {

    var data = $(this).attr('value');
    var sc = $(this).attr('schedule');

    window.location.href = "interview.php?room="+data+"?schedule="+sc;

});

$("#ansResponse").on("show.bs.modal",function (e) {

    var w=$("#ansResponse").data("answerid");


    var i= "0a715c67-bfaa-4d5d-b127-f05759c09531";

    var video =document.getElementById("video1");










    var currentDirectory = window.location.pathname.split('/').slice(0, -1).join('/')+"/upload/files/"+answeredQuestionid+"/misc_data";


    var myRequest =new Request(currentDirectory);
    fetch(myRequest)
        .then(function(response) {
            return response.blob();
        })
        .then(function(myBlob) {
            var objectURL = URL.createObjectURL(myBlob);
            video.src = objectURL;
            // player.wavesurfer().load(objectURL);
            //player.src({ type: "video/webm", src: objectURL });
            //player.play();
        });


});


$("#modalClose").on("click",function (object) {
    var video =document.getElementById("video1");
    video.pause();
});
$("#modalAnswerSave").on("click",function (object) {
     var i=  $("#answerPopup").data('id');
     var respond= $("#respondText").val();

    $.ajax({
        url: 'set.php',
        type: 'post',
        data: {'type': "ans_question", 'id': i ,'text': respond }

    })
        .done(function(data) {





        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

});


$("#audioDialog").on("show.bs.modal",function (e) {

    var customerid=e.relatedTarget.dataset.customerid;
    var qId = e.relatedTarget.dataset.questionid;
    var player = videojs('myAudio', {
        controls: true,
        width: 600,
        height: 300,
        plugins: {
            wavesurfer: {
                src: 'live',
                waveColor: '#114b5f',
                progressColor: 'black',
                debug: true,
                cursorWidth: 1,
                msDisplayMax: 20,
                hideScrollbar: true
            },
            record: {
                audio: true,
                video: false,
                maxLength: 120,
                debug: true
            }
        }
    }, function() {
        // print version information at startup
        videojs.log('Using video.js', videojs.VERSION,
            'with videojs-record', videojs.getPluginVersion('record'),
            '+ videojs-wavesurfer', videojs.getPluginVersion('wavesurfer'),
            'and recordrtc', RecordRTC.version);
    });

// player error handling
    player.on('deviceError', function() {
        console.warn('device error:', player.deviceErrorCode);
    });

    player.on('error', function(error) {
        console.log('error:', error);
    });
    player.on('startRecord', function(error) {
        i= null

    });

// data is available
    player.on('finishRecord', function() {
        // the blob object contains the audio data
        var audioFile = player.recordedData;

        console.log('finished recording: ', audioFile);

        // upload data to server
        var filesList = [audioFile];
        uploader.addFiles(audioFile);
       var id= uploader._currentBatchId;

        $("#audioSave").attr('data-id',id);
        $("#audioSave").attr('data-questionid',qId);
        $("#audioSave").attr('data-customerid',customerid);
        //var fi = uploader.getAll();

        debug.log(uploader);
    });
});
$("#videoDialog").on("show.bs.modal",function (e) {



    var customerid=e.relatedTarget.dataset.customerid;
    var qId = e.relatedTarget.dataset.questionid;
    var player = videojs('myVideo', {
        controls: true,
        width: 600,
        height: 300,
        plugins: {

            record: {
                audio:true,
                video:true,
                maxLength: 120,
                debug: true
            }
        }
    }, function() {
        // print version information at startup
        videojs.log('Using video.js', videojs.VERSION,
            'with videojs-record', videojs.getPluginVersion('record'),
            '+ videojs-wavesurfer', videojs.getPluginVersion('wavesurfer'),
            'and recordrtc', RecordRTC.version);
    });

// player error handling
    player.on('deviceError', function() {
        console.warn('device error:', player.deviceErrorCode);
    });

    player.on('error', function(error) {
        console.log('error:', error);
    });
    player.on('startRecord', function(error) {
        i= null

    });

// data is available
    player.on('finishRecord', function() {
        // the blob object contains the audio data
        var audioFile = player.recordedData.video;


        console.log('finished recording: ', audioFile);

        // upload data to server
        var filesList = [audioFile];
        uploader.clearStoredFiles();
        uploader.addFiles(audioFile);
        var id= uploader._currentBatchId;
        $("#videoSave").attr('data-id',id);
        $("#videoSave").attr('data-customerid',customerid);
        $("#videoSave").attr('data-questionid',qId);
        //var fi = uploader.getAll();

        debug.log(uploader);
    });




});

$("#videoSave").add("#audioSave").on('click',function (e) {

    var ddd =e.relatedTarget;
    uploader.uploadStoredFiles();

    var customerid= $(this).data('customerid');
    var questionid = $(this).data('questionid');
    var media = $(this).data('id');

    $.ajax({
        url: 'set.php',
        type: 'post',
        data: {'add_media': true,'questionid': questionid, 'media':media, 'customerid': customerid }

    })
        .done(function(data) {
            d = jQuery.parseJSON(data);



        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
});

// $("#audioSave").on('click',function (object) {
//     uploader.uploadStoredFiles();
//     var questionid = $(this).data('questionid');
//     var media = $(this).data('id');
//
//     $.ajax({
//         url: 'set.php',
//         type: 'post',
//         data: {'question': questionid, 'month':media}
//
//     })
//         .done(function(data) {
//
//
//
//
//         })
//         .fail(function() {
//             console.log("error");
//         })
//         .always(function() {
//             console.log("complete");
//         });
// })
//
// $("#audioDialog","#videoDialog").on('hide.bs.modal', function () {
//     uploader.clearStoredFiles();
// })



$(".question").one("click",function()
{
  $(this).find(".ans").toggle()


});

$(".question").one("click",function()
{



    $(this).find(".ans").toggle()


});

var i= null;
// initialize Fine Uploader
var uploader = new qq.FineUploaderBasic({
    debug: true,
    multiple:false,
    autoUpload:false,
    request: {
        endpoint: 'upload/endpoint.php'
    },
    // validation: {
    //     allowedExtensions: ['mp3', 'ogg', 'oga', 'ogg','webm','mp4']
    // },
    callbacks: {
        onDelete: function(id) {
            // ...
        },
        onError: function(id,name,error,xhr)
        {
            console.log(error);
        },
        onDeleteComplete: function(id, xhr, isError) { }
        //...
        ,
        onSubmit: function(id,name)
        {

            console.log(id);
        },
        onUpload: function(id,name)
        {
            $("#audioSave").attr('data-id',uploader.getUuid(id));
            $("#videoSave").attr('data-id',uploader.getUuid(id));
            console.log(id);
        },
        onValidate: function(data,buttonContainer)
        {
            console.log(data);
        },

        onComplete: function(id,name,response)
        {

        }


    }

});
// setup videojs-record


$(".saveM").on("click", function (object) {

    if(i!== null)
    {
        var id = $(this).parents("tr").attr("value");

        $.post( "set.php", { id: id, file: i , addQuestion: true} );

    }






})
function saveQuestion() {
    if (i !== null)
    {

    }

};
