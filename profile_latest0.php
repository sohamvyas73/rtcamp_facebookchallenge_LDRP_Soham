<?php 
session_start();

if (isset($_POST['zip_button'])) {

  header("location:http://sv.project.stepinsolutions.in/zip_download.php");

}
if(isset($_POST['zip_custom'])){
  
  if(isset($_POST['photos_check']) and count($_POST['photos_check']) > 0)  
     { 
  
        $_SESSION['album_selected']=$_POST['photos_check'];
        header("location:http://sv.project.stepinsolutions.in/zip_custom.php");
  
  }

}
if (isset($_POST['move_button'])) {
  header("location:http://sv.project.stepinsolutions.in/move_all.php");
  
}
if(isset($_POST['move_custom'])){
  
  if(isset($_POST['photos_checkg']) and count($_POST['photos_checkg']) > 0)  
     { 
  
        $_SESSION['album_selected']=$_POST['photos_checkg'];
        header("location:http://sv.project.stepinsolutions.in/move_custom.php");
  
  }

}
?>  
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="https://rtcamp.com/wp-content/uploads/2018/04/rtcamp-favicon.png" />
  <link rel="mask-icon" type="" href="" color="#111" />
  <link rel="stylesheet" type="text/css" href="hover_1.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="checkbox.css">
  <link rel="stylesheet" type="text/css" href="pop.css">

  <link rel="stylesheet" type="text/css" href="download.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="loader.css">
  <script src="profile.js" type="text/javascript"></script>
  

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<style type="text/css">
#gallery {
  padding-top: 40px;
}
@media screen and (max-width: 768px) {
  #gallery {
    padding: 60px 30px 0 30px;
  }
}

.img-wrapper {
  position: relative;
  margin-top: 15px;
}
.img-wrapper img {
  width: 250px;
  height:250px;
}

.img-overlay {

  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height:100%;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
}
@media screen and (max-width: 768px){
  
.img-wrapper {
  
  position: relative;
  margin-top: 1px;
}
.img-overlay{
    width: 250px;
  height: 240px;  
}
}
.img-overlay i {
  color: black;
  font-size: 7em;
}

#overlay {
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#overlay img {
  width: 550px;
  height: auto;
  -o-object-fit: contain;
     object-fit: contain;
}
@media screen and (max-width: 768px) {
  #overlay img {
    width: 85%;
    
  }
  #overlay{
    width: 100%;
  height: 100%;
  
  }
}

@media screen and (max-width: 768px) {
  #nextButton {
    padding-right: 25px;
    font-size: 1.5em;
  }
}

#prevButton {
  color: #fff;
  font-size: 2em;
  padding-right: 20px;
  transition: opacity 0.8s;
}
#prevButton:hover {
  opacity: 0.7;
}
@media screen and (max-width: 768px) {
  #prevButton {
    font-size: 1.5em;
  }
}

#exitButton {
  color: #fff;
  font-size: 2em;
  transition: opacity 0.8s;
  position: absolute;
  top: 15px;
  right: 15px;
}
#exitButton:hover {
  opacity: 0.7;
}
@media screen and (max-width: 768px) {
  #exitButton {
    font-size: 3em;
  }
  
}
.img-responsive{
  width: 250px;
  height: 250px;
}
@media screen and (max-width: 768px) {
  .img-responsive{
    padding-bottom: 10px;
  max-width: 100%;
  max-height: 100%;
}  
}


.column {
    float: left;
   width: 25%;
    padding: 1%; 
}

/* Clearfix (clear floats) */

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 768px) {
    .column {
     width: 100%;
    
    }
}
.container {
  margin: 0px;
  padding:10px 10px 10px  ;
  top: 50px;
  width: 100%;
  background-color: #fff;
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
}
.cont {
  
  display:inline-block;
  margin: 0px;
  padding:10px 10px 10px  ;
  top: 50px;
  width: 100%;
  background-color: #fff;
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
}

header img{
  background: #eee;
  /*background-image: url("https://image.noelshack.com/fichiers/2017/38/2/1505775648-annapurnafocus.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-color: red;
  */height: 350px;
  width: 100%;
}

header i {
  position: relative;
  cursor: pointer;
  right: -96%;
  top: 25px;
  font-size: 18px !important;
  color: #fff;
}

@media (max-width: 768px) {
  header {
    height: 250px;
  } 
  
   header i {
    right: -90%;
  }
}

main {
      padding: 20px 20px 0px 20px;
}
.left {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.photo {
  width: 200px;
  height: 200px;
  margin-top: -100px;
  border-radius: 100px;
  border: 4px solid #fff;
}
@media screen and (max-width: 768px){
  .photo img{
  width: 250px;
  height: 150px;
  margin-top: -100px;
  border-radius: 100px;
  border: 4px solid #fff;
  background: rgba(0, 0, 0, 0.7);

}
}
.name {
  margin-top: 20px;
  
  font-weight: 600;
  font-size: 18pt;
  color: #777;
}

.info {
  margin-top: -5px;
  margin-bottom: 5px;
  
  font-size: 11pt;
  color: #aaa;
}

.stats {
  margin-top: 25px;
  text-align: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #ededed;

}


.number-stat {
  padding: 0px;
  font-size: 14pt;
  font-weight: bold;
  
  color: #aaa;
}

.desc-stat {
  margin-top: -15px;
  font-size: 10pt;
  color: #bbb;
}

.desc {
  text-align: center;
  margin-top: 25px;
  margin: 25px 40px;
  color: #999;
  font-size: 11pt;
 
  padding-bottom: 25px;
  border-bottom: 1px solid #ededed;
}

.right {
  padding: 0 25px 0 25px !important;
}

.nav {
  display: inline-flex;
}

.nav li {
  margin: 40px 30px 0 10px;
  cursor: pointer;
  font-size: 13pt;
  text-transform: uppercase;
  
  font-weight: 500;
  color: #888;
}
.nav h1 {
  margin: 40px 30px 0 10px;
  cursor: pointer;
  font-size: 13pt;
  text-transform: uppercase;
  
  font-weight: 500;
  color: #888;
}

.nav li:hover, .nav li:nth-child(1)  { 
  color: #999;
  border-bottom: 2px solid #999;
}
.navi h1:hover { 
  color: red;
  border-bottom: 2px solid #999;
}

@media (max-width: 768px) {
  .gallery img {
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
  width: auto; 
  height: auto;
  cursor: pointer;
 
  
}
}




</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
    
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

<body>
  <div id="load"></div>
<script type="text/javascript">
  document.onreadystatechange = function () {
      setTimeout(function(){
         document.getElementById('load').style.visibility="hidden";
      },1000);
  }
</script>
<?php
error_reporting(0);

require 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '690453101307206', // Replace {app-id} with your app id
  'app_secret' => '8805ec51cb6b0acd3ca5a678ecca5133',
  'default_graph_version' => 'v2.2',
  ]);
if (isset($_POST['logout'])) {
 session_destroy();
 $logout = $fb -> getLogoutUrl(array('next' => 'http://localhost/RTcamp/index.php'));
    echo "<script type='text/javascript'>window.location('http://localhost/RTcamp/index.php')</script>";
}
try {
  // Returns a `Facebook\FacebookResponse` object
  //$user_id = $fb->getUser();
  $responseUser = $fb->get('/me?fields=id,name,email,cover,gender,picture,link,birthday,friends', $_SESSION['fb_access']);
  $responseImage = $fb->get('/me/picture?redirect=false&width=480&hight=480', $_SESSION['fb_access']);
  $user = $responseUser->getGraphUser();

  $responseI = $fb->get('/me/photos?fields=picture,name,source,Likes,likes,Comments,comments&type=uploaded&width=480&hight=480', $_SESSION['fb_access'])->getGraphEdge()->asArray();
  $albums = $fb->get('/me/albums?fields=name,id,link,type&width=480&hight=480', $_SESSION['fb_access'])->getGraphEdge()->asArray();
  $albums_photos = $fb->get('/me/albums?fields=name,id,link,type', $_SESSION['fb_access'])->getGraphEdge()->asArray();
  
  $responseCover = $fb->get('/me?fields=cover', $_SESSION['fb_access']);

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$i=0;
$coverpic=0;

$image = $responseImage->getGraphUser();
$cover = $responseCover->getGraphUser(); 


?>

<?php

$bd=$user['birthday'];

$bd1=get_object_vars($bd);


?>
<div class="container">
  <header>
    <?php foreach ($albums_photos as $album_name) {
      
      if ($album_name['name'] == "Cover Photos") {
        $current_coverid=$album_name['id'];
        $al = $fb->get("/".$current_coverid."/photos?fields=source", $_SESSION['fb_access'])->getGraphEdge()->asArray();
        echo "<img id='cover_css' src='{$al[0]['source']}'";
      }

    } 
foreach ($albums_photos as $album_name) {
              
              //print_r($album_name['name']);
               //echo "<h1>" .$album_name['name']. "</h1>"; 
                 $current_id=$album_name['id'];
                 //echo $current_id;
                 $al_zip[] = $fb->get("/".$current_id."/photos?fields=source", $_SESSION['fb_access'])->getGraphEdge()->asArray();

                }
for ($j=0; $j <sizeof($al_zip) ; $j++) { 
                  # code...
                
                 for ($i=0; $i <sizeof($al_zip[$j]) ; $i++) {

                  $zip_image[]=$al_zip[$j][$i]['source'];
                }
}

     ?>
</header>  
  <main>
    
    <div class="row">
      <div class="left col-lg-4">
        <div class="photo-left">
          <img class='photo' src="<?=$image['url']?>"/>
          <form method="POST" action="profile_latest0.php">
          <a href="<?php echo $logout;?>" target="_top"></a>
          <!--<input type="submit" name="logout" value="logout" align="right">--></form>
        </div>
        <?php echo "<h4 class='name'>" .$user['name']."</h4>"; ?>
        <?php echo "<p class='info'>".$bd1['date']."</p>"; ?>
        <!--<h4 class="name">Ronak Gajjar</h4>
        <p class="info">03/10/1997</p>
        --><?php echo "<p class='info'>".$user['email']."</p>";?>
        <div class="stats row">
          <div class="stat col-xs-4" style="padding-right: 50px;">
            <?php echo "<p class='number-stat'>".sizeof($user['friends'])."</p>";?>
            <p class="desc-stat">Test Users</p>
          </div>
          
          <div class="stat col-xs-4" style="padding-left: 50px;">

            <p class="number-stat"><?php print_r(sizeof($zip_image)); ?></p>
            <p class="desc-stat">Uploads</p>
          </div>
        </div>
        <p class="desc">Hi ! My name is <?php echo $user['name'];?>. I really enjoy this. </p>
            <div class='box'>     
<a class='Button' href='#popup1' style='float: left;'><span class='Button__textWrapper'><span class='Button__text'>Download</span><span class='Button__icon' aria-hidden='true'></span></span></a>
<a class='Button' href='#popup2' style='float: right;'><span class='Button__textWrapper'><span class='Button__text'>Google Backup</span><span class='Button__icon' aria-hidden='true'></span></span></a>
</div>        
            
      </div>
      <div class="right col-lg-8">
        <ul class="nav">
          <li>Albums</li>
        </ul>
       
        <section id="gallery">  
        <?php  
            for ($i=0; $i <sizeof($albums_photos) ; $i++) { 
              $albumname[]=$albums_photos[$i]['name'];
            }
          //print_r($albumname);
          $flag_photos=0;
            foreach ($albums_photos as $album_name) {
              $current_id=$album_name['id'];
              $al = $fb->get("/".$current_id."/photos?fields=source", $_SESSION['fb_access'])->getGraphEdge()->asArray();
              echo "<h1 class='navi'>" .$album_name['name']. "</h1>"; 

            echo "<div class='cont'><div id='image-gallery'><div class='row'>";
                          
              //echo "";
                 for ($i=0; $i <sizeof($al) ; $i++) { 
                  echo " <div class='column image'>
          <div class='img-wrapper'><a href='{$al[$i]['source']}'><img src='{$al[$i]['source']}' class='img-responsive'/></a>
          <div class='img-overlay'>
              
            </div>
            
          </div>
          
        </div>";
                }
          echo "
        </div><!-- End row -->
        </div><!-- End image gallery -->
        </div>";
          //echo "";
        }
        
     /* echo "<h1 class='navi'>Photos</h1>";
              
            echo "<div class='cont'>
    <div id='image-gallery'>
      <div class='row'>";
      //print_r($responseI);
           foreach($responseI as $photo)
        { 
          if ($i == 0) {
            //echo " <p> {$photo['name']} </p> ";
          }
          $i=$i + 1;
          if ($photo['id'] == $cover['id']) {
            echo "its cover yeey";
            $coverpic = $photo['picture'];
          }
          //echo " <img src='{$photo['cover_photo']}'/>";
            //echo "  ";
            //print_r($photo);
            echo "
        <div class='column image'>
          <div class='img-wrapper'><a href='{$photo['source']}'><img src='{$photo['source']}' class='img-responsive'></a><div class='img-overlay'>
              
            </div>
            
          </div>
        </div>
           
  ";
        }
        echo "</div><!-- End row -->
    </div><!-- End image gallery -->
    </div>";*/
?>
</section>
    <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

  

    <script >
      var d_h_s = Array.from(document.querySelectorAll('h1'));
    
      d_h_s.forEach((e)=>{
        e.addEventListener("click",(h)=>{
          var divAfterH1 = e.nextSibling;
          if(divAfterH1.style.display=="none"){
            divAfterH1.style.display="block";
          }
          else{
            divAfterH1.style.display="none";
          }
        });
    });
       // Gallery image hover
$(".img-wrapper").hover(
function () {
  $(this).find(".img-overlay").animate({ opacity: 1 }, 60);
}, function () {
  $(this).find(".img-overlay").animate({ opacity: 0 }, 60);
});


// Lightbox
var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");
var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

// Add overlay
$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
$("#gallery").append($overlay);

// Hide overlay on default
$overlay.hide();

// When an image is clicked
$(".img-overlay").click(function (event) {
  // Prevents default behavior
  event.preventDefault();
  // Adds href attribute to variable
  var imageLocation = $(this).prev().attr("href");
  // Add the image src to $image
  $image.attr("src", imageLocation);
  // Fade in the overlay
  $overlay.fadeIn("slow");
});

// When the overlay is clicked
$overlay.click(function () {
  // Fade out the overlay
  $(this).fadeOut("slow");
});

// When next button is clicked
$nextButton.click(function (event) {
  // Hide the current image
  $("#overlay img").hide();
  // Overlay image location
  var $currentImgSrc = $("#overlay img").attr("src");
  // Image with matching location of the overlay image
  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
  // Finds the next image
  var $nextImg = $($currentImg.closest(".image").next().find("img"));
  // All of the images in the gallery
  var $images = $("#image-gallery img");
  // If there is a next image
  if ($nextImg.length > 0) {
    // Fade in the next image
    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
  } else {
    // Otherwise fade in the first image
    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
  }
  // Prevents overlay from being hidden
  event.stopPropagation();
});

// When previous button is clicked
$prevButton.click(function (event) {
  // Hide the current image
  $("#overlay img").hide();
  // Overlay image location
  var $currentImgSrc = $("#overlay img").attr("src");
  // Image with matching location of the overlay image
  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
  // Finds the next image
  var $nextImg = $($currentImg.closest(".image").prev().find("img"));
  // Fade in the next image
  $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
  // Prevents overlay from being hidden
  event.stopPropagation();
});

// When the exit button is clicked
$exitButton.click(function () {
  // Fade out the overlay
  $("#overlay").fadeOut("slow");
});
      //# sourceURL=pen.js
    </script>



 </div> 
</div><form method="POST" action="profile_latest0.php">

<div class='pop'>
 <div id='popup1' class='overlay'>
    <div class='popup'>
        
        <h4>Downloading all the images of facebook</h4>
        <a class='close' href='#'>&times;</a>

<div class='boxes'>
<?php 
$i=1;
foreach ($albums_photos as $album_name) {

  echo "<input type='checkbox'  name='photos_check[]' id='box-".$i."' value='".$album_name['name']."'>
  <label for='box-".$i."'>".$album_name['name']."</label>";
  $i++;
} 
 ?>  
</div>



      
            <br>
      <input type='submit' value='Download All' name="zip_button">
      <input type='submit' value='Download Selected' name="zip_custom" style='float: right;'>
    </div>
</div>
<div class='pop'>

<div id='popup2' class='overlay'>
    <div class='popup'>
        
        <h4>Downloading all the images of facebook</h4>
        <a class='close' href='#'>&times;</a>

<div class='boxes'>
<?php 
$i=1;
foreach ($albums_photos as $album_name) {

  echo "<input type='checkbox'  name='photos_checkg[]' id='boxg-".$i."' value='".$album_name['name']."'>
  <label for='boxg-".$i."'>".$album_name['name']."</label>";
  $i++;
} 
 ?>  
</div>



      
            <br>
      <input type='submit' value='Move All' name="move_button">
      <input type='submit' value='Move Selected' name="move_custom" style='float: right;'>
    </div>
</div>


</div>
</div>
    </form>

</body>

</html>

