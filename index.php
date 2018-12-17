<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>YouTube Lister</title>

  <script src="js/j-latest.min.js" type="text/javascript"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <style>
    list-style-type:none;
    .selected{
      color:black;
      font-weight:bold;
    }
  </style>
</head>
<body>
<?php
$playlistId = $_GET['id'];
$api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=".$playlistId."&key=AIzaSyCL1hqAzVWDO9mgfczk1Sb1sib5WCY3SnI";

$data = json_decode(file_get_contents($api_url));
?>
<div class="container">
    <div class="row" style="margin-top:50px;">
      <div class="col-xs-12 col-md-8 col-sm-8 video-container">
        <iframe src="https://www.youtube.com/embed/<?php echo $data->items[0]->snippet->resourceId->videoId;?>" width="100%" height="450px" frameborder='0' allowfullscreen=''></iframe>
      </div>

      <div class="col-xs-12 col-md-4 col-sm-4" style="padding:0px;background-color:#cc;">
        <ul style="padding:0px;">
            <?php
                foreach($data->items as $video)
                {
                  $title = $video->snippet->title;
                  $description = $video->snippet->description;
                  $thumbnail = $video->snippet->thumbnails->high->url;
                  $videoId = $video->snippet->resourceId->videoId;
                  $data = $video->snippet->publishedAt;

             ?>
             <li>
                 <span style="cursor:pointer;margin-bottom:10px;" onclick="swithvideo('<?php echo $videoId;?>');">
                   <div class="col-xs-12" id="vid-<?php echo $videoId;?>" style="padding-right:0px;padding-top:8px;padding-bottom:8px;border-bottom:1px solid white;">
                     <img src="https://i.ytimg.com/vi<?php echo videoId;?>/default.jpg">

                   </div>
                   <div class="text col-md-8 col-lg-8">
                     <?php echo $title; ?>
                     <p class="date"><?php echo date('M j, Y',strtotime($date));?></p>
                   </div>
                 </span>
             </li>
             <?php } ?>
        </ul>
      </div>


    </div>

</div>
<script type="text/javascript">
  $("#vid-<?php echo $data->items[0]->snippet->resourceId->videoId; ?>").addClass('selected');

  function swithvideo(videoId){
    $(".video-container iframe").attr('src', 'https://youtube.com/embed'+videoId);
    $(".selected").removeClass('selected');
    $("#vid-videoId").addClass('selected');
  }

</script>
</body>
</html>
