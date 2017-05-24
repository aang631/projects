/*global $*/
(function () {
    "use strict";
    var dragging,
        offset,
        currentZindex = 1,
        savedPositions = [],
        saveButton = $('#saveButton'),
        deleteButton = $('#deleteButton'),
        restart= $('#restartButton'),
        loadSavedPosition= $('#loadSavedPositionButton'),
        superMrSong=$('#superMrSong'),
        bucketOfPartsSong=$('#bucketOfPartsSong'),
        stopMusic=$('#stopMusic');

    $(document).on('mousedown touchstart', '.draggable', function (event) {
        dragging = $(this);
        offset = {
            top: event.offsetY,
            left: event.offsetX
        };
        dragging.css({
            position: "absolute",
            top: event.clientY - offset.top,
            left: event.clientX - offset.left,
            zIndex: ++currentZindex
        });
    }).on('mouseup touchend', function (event) {
        savedPositions.forEach(function (elem, index) {
            if (elem.id === dragging[0].id) {
                savedPositions.splice(index, 1);
            }
        });
        savedPositions.push({
            id: dragging[0].id,
            top: dragging.css('top'),
            left: dragging.css('left'),
            zIndex: dragging.css('zIndex')
        });
        //localStorage.savedPositions = JSON.stringify(savedPositions);
        dragging = null;
    });

    $(document).on('mousemove touchmove', function (event) {
        if (dragging) {
            dragging.css({
                top: event.clientY - offset.top,
                left: event.clientX - offset.left,
            });
            event.preventDefault();
        }
    });
    if (localStorage.savedPositions) {
        savedPositions = JSON.parse(localStorage.savedPositions);
        savedPositions.forEach(function (element) {
            var id = $('#' + element.id);
            id.css({
                position: 'absolute',
                top: element.top,
                left: element.left,
                zIndex: element.zIndex
            });
            if (element.zIndex) {
                currentZindex = element.zIndex;
            }
        });
    }
    saveButton.click(function () {
        localStorage.savedPositions = JSON.stringify(savedPositions);
    });
    deleteButton.click(function () {
        localStorage.clear();
    });
    loadSavedPosition.click(function () {
        location.reload();
    });
     restart.click(function () {
       $('#piecesDiv img').css('top', 'auto').css('left', 'auto').css('position' ,'relative');
    });

    superMrSong.click(function(){
         $('#currentSong').attr('src','music/superMrPotatoHead.mp3');
                $('#currentSong')[0].play();
    });
    bucketOfPartsSong.click(function(){
           $('#currentSong').attr('src','music/mrPotatoHeadAndHisBucketOfParts.mp3');
             $('#currentSong')[0].play();
    });
     stopMusic.click(function(){
           $('#currentSong').attr('src','');
             $('#currentSong')[0].play();
    });

})();



/* AN ALTERNATE WAY TO GET ALL THE IMAGES/PIECES FROM A FOLDER IN JS
 var folder = "images/";
    $.ajax({
        url: folder,
        success: function (data) {
            $(data).find("a").attr("href", function (i, val) {
                if (val.match(/\.(jpe?g|png|gif)$/)) {
                    body.append("<img src='" + folder + val + "'>");
                }
            });
        }
    });
    */