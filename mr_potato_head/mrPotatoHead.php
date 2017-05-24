<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <style>
     html, body{
        height: 100%;
        min-width:100%;
        padding: 0;
        margin: 0;
        box-sizing:border-box;
        overflow:hidden;
    }
    #piecesDiv{
        height: 100px;
        max-width: 100%;
        overflow-y: auto;
        background-image: url("images/piecesBackground.jfif");
        border-bottom:black solid 5px;
    }
    #playingDiv{
        height: 90%;
        max-width: 100%;
        overflow-y: auto;
        background-image: url("images/background.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        
    }

    #mrPotatoHeadBody{
          position: absolute;
          top: 0; bottom:0; left: 0; right:0;
          margin: auto;
          z-index:0;
    }
    .selectionBar{
        padding:5px;
        display:inline-block;
        background-color:yellow;
        border: 4px solid aqua;
        border-radius: 10px;
    }
    #musicBar{
        right: 0;
        position: absolute;
    }

    </style>
</head>

<body>
    <div id="piecesDiv">
        <?php
            $dirname = "images/playingPieces/";
            $images = glob($dirname."*.png");
            foreach($images as $image) {
                echo '<img class="draggable" id="'.substr(substr($image,21),0,-4).'" src="'.$image.'" />';
            }
        ?>
    </div>
    <div id="playingDiv"> 
        <div id='saveBar' class='selectionBar'>
          <img id="mrPotatoHeadBody" src="images/body.png">
            <button id='saveButton' class="btn btn-xl btn-success">Save Current Position</button>
            <button id='loadSavedPositionButton' class="btn btn-xl btn-info">Load Saved Position</button>
            <button id='deleteButton' class="btn btn-xl btn-warning">Delete Saved Postion</button>
            <button id='restartButton' class="btn btn-xl btn-danger">Reset</button>
        </div>
        <div id='musicBar' class='selectionBar'>
            Pick a song <span class="glyphicon glyphicon-volume-up">
            <button id='superMrSong' class="btn btn-xl btn-success">Super Mr Potato Head <span class="glyphicon glyphicon-play"></span></button>
            <button id='bucketOfPartsSong' class="btn btn-xl btn-success">Bucket Full of Parts <span class="glyphicon glyphicon-play"></span></button>
            <button id='stopMusic' class="btn btn-xl btn-danger">No Music<span class="glyphicon glyphicon-stop"></span></button>
            <audio  id='currentSong'  src="music/superMrPotatoHead.mp3" autoplay loop>  Your browser does not support the audio element.</audio>
        </div>
    </div>
        <script src="/jquery-3.1.1.min.js"></script>
        <script src="/jquery.ui.touch-punch.min.js"></script>  
        <script src="mrPotatoHead.js"></script>
        
</body>

</html>