<!DOCTYPE html>
<html>
<head>
    <title>Zip Download</title>
</head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://rtcamp.com/wp-content/uploads/2018/04/rtcamp-favicon.png" />
    <link rel="stylesheet" type="text/css" href="pop.css">
  <link rel="mask-icon" type="" href="" color="#111" />
  <link rel="stylesheet" type="text/css" href="hover_1.css">
<link rel="shortcut icon" type="image/x-icon" href="https://rtcamp.com/wp-content/uploads/2018/04/rtcamp-favicon.png" />
  <link rel="mask-icon" type="" href="" color="#111" />
  <link rel="stylesheet" type="text/css" href="hover_1.css">
<link rel="stylesheet" type="text/css" href="loader.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="checkbox.css">
  <link rel="stylesheet" type="text/css" href="pop.css">

  <link rel="stylesheet" type="text/css" href="download.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <link rel="stylesheet" type="text/css" href="download.css">
<style type="text/css">
    
body {
    background-color: whitesmoke;
}
a{
    text-decoration: none;
}

.buttonDownload {
    display: inline-block;
    position: relative;
    padding: 10px 25px;
    text-decoration: none;
    background-color: #4CC713;
    color: white;
  
    font-family: sans-serif;
    text-decoration: none;
    font-size:1.2em;
    text-align: center;
    text-indent: 15px;
}

.buttonDownload:hover {
    background-color: #333;
    color: white;
    text-decoration: none;
}

.buttonDownload:before, .buttonDownload:after {
    content: '   ';
    position: absolute;
    left: 15px;
    top: 52%;
    text-decoration: none;

}

/* Download box shape  */
.buttonDownload:before {
    width: 14px;
    height: 5px;
    border-style: solid;
    border-width: 0 2px 2px;
    text-decoration: none;

}

/* Download arrow shape */
.buttonDownload:after {
    width: 0;
    height: 0;
    margin-left: 3px;
    margin-top: -7px;
    text-decoration: none;
    border-style: solid;
    border-width: 4px 4px 0 4px;
    border-color: transparent;
    border-top-color: inherit;
    text-decoration: none;
    
    animation: downloadArrow 2s linear infinite;
    animation-play-state: paused;
}

.buttonDownload:hover:before {
    border-color: #4CC713;
    text-decoration: none;

}

.buttonDownload:hover:after {
    border-top-color: #4CC713;
    animation-play-state: running;
    text-decoration: none;
}

@keyframes downloadArrow {
    0% {
        margin-top: -7px;
        opacity: 1;
    }
    
    0.001% {
        margin-top: -15px;
        opacity: 0;
    }
    
    50% {
        opacity: 1;
    }
    
    100% {
        margin-top: 0;
        opacity: 0;
    }
}</style>
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
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '690453101307206', // Replace {app-id} with your app id
  'app_secret' => '8805ec51cb6b0acd3ca5a678ecca5133',
  'default_graph_version' => 'v2.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  //$user_id = $fb->getUser();
  $responseUser = $fb->get('/me?fields=id,name,email,cover,gender,picture,link,birthday', $_SESSION['fb_access']);
  $albums = $fb->get('/me/albums?fields=name,id,link,type&width=480&hight=480', $_SESSION['fb_access'])->getGraphEdge()->asArray();
  $albums_photos = $fb->get('/me/albums?fields=name,id,link,type', $_SESSION['fb_access'])->getGraphEdge()->asArray();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
foreach ($albums_photos as $album_name) {
              
              //print_r($album_name['name']);
              // echo "<h1>" .$album_name['name']. "</h1>"; 
                 $current_id=$album_name['id'];
                 $var_name[]=$album_name['name'];

                 //echo $current_id;
                 $al_zip[$album_name['name']] = $fb->get("/".$current_id."/photos?fields=source", $_SESSION['fb_access'])->getGraphEdge()->asArray();

                }
for ($j=0; $j <sizeof($al_zip) ; $j++) {
        
        for ($i=0; $i <sizeof($al_zip[$var_name[$j]]) ; $i++) {
                  //$var_name = $al_zip['name'];
                  ${$var_name[$j]}[]=$al_zip[$var_name[$j]][$i]['source'];
                
                }
                $zip_image[]= ${$var_name[$j]};

}

$zipname = './zip/album.zip';
unlink($zipname);
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);

for ($i=0; $i < sizeof($var_name); $i++) {

    foreach (${$var_name[$i]} as $file) {

        $download_file = file_get_contents($file);
        #add it to the zip
        $zip->addFromString($var_name[$i]."/".basename($file), $download_file);
  
    }
}

$zip->close();
//header('Content-disposition: attachment; filename="myfile.zip"');

//header('Content-Type: application/zip');
//header('Content-Length: ' . filesize($zipname));
//readfile($zipname);
//unlink($zipname);
echo "<br><br><br><br>
<div class='message-box'>
            <div class='alert alert-success' role='alert'>
Album archived successfully — check it out!


</div>
</div>

<center>
    <br><br><br><br><br><br><br>
<a class='buttonDownload' href='".$zipname."'download>Click Here to Download</a>
<br><br><br>
<div class='box'>     
<a class='Button' href='profile_latest0.php'><span class='Button__textWrapper'><span class='Button__text'>Go Home</span><span class='Button__icon' aria-hidden='true'></span></span></a></center>
</div>";
//echo "<a href='".$zipname."'download>Link</a>";
//echo "<form action='zip_download.php' method='POST'><input type='submit' value='Go Home' name='home'></form>";
if (isset($_POST['home'])) {
	# code...

echo "<script type='text/javascript'>window.location='profile_latest0.php'</script>";

}
 ?>

 </body>
</html>
