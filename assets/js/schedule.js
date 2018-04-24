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



    $(this).find(".ans").toggle()


})

var i= null;
// initialize Fine Uploader
var uploader = new qq.FineUploaderBasic({
    debug: true,
    multiple:false,

    defaultName: "sound",
    request: {
        endpoint: 'upload/endpoint.php'
    },
    validation: {
        allowedExtensions: ['mp3', 'ogg', 'oga', 'ogg','webm','mp4']
    },
    callbacks: {
        onDelete: function(id) {
            // ...
        },
        onDeleteComplete: function(id, xhr, isError) { }
        //...
        ,
        onComplete: function(id,name,response)
        {
            var fi= uploader.getFile(id);

            console.log(id);

            i = response["uuid"];
            var b = uploader.getFile(i);
            console.log(b);

            // var oReq = new XMLHttpRequest();
            // oReq.open("GET", "../upload/files/"+i+"/misc_data", true);
            // oReq.responseType = "arraybuffer";
            //
            // oReq.onload = function(oEvent) {
            //    // i = new Blob([oReq.response], {type: "audio/webm"});
            //     //console.log(blob);
            //     // ...
            // };
            //
            // oReq.send();


        }


    }

});
// setup videojs-record
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

    //var fi = uploader.getAll();

    debug.log(uploader);
});

$("#saveM").on("click", function (object) {

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

}
$(".recordButton").on("click", function (object) {
    $("#dialog").dialog("open");




})
$( "#dialog" ).dialog({
    autoOpen: false,
    width: 600,
    height: 500,
    show: {
        effect: "blind",
        duration: 1000
    },
    hide: {
        effect: "explode",
        duration: 1000
    }
});