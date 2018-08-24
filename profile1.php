<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Mukta');
  html,body {
  background: #efefef;
  
}

.container {
  max-width: 1320px;
  margin: 10px auto 10px;
  padding: 0 !important;
 
  background-color: #fff;
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
}

header {
  background: #eee;
  background-image: url("https://image.noelshack.com/fichiers/2017/38/2/1505775648-annapurnafocus.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-color: red;
  height: 250px;
}

header i {
  position: relative;
  cursor: pointer;
  right: -96%;
  top: 25px;
  font-size: 18px !important;
  color: #fff;
}

@media (max-width:800px) {
  header {
    height: 150px;
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
  margin-top: -220px;
  border-radius: 100px;
  border: 4px solid #fff;
}
@media screen and (max-width: 800px){
  .photo {
  width: 150px;
  height: 150px;
  margin-top: -100px;
  border-radius: 100px;
  border: 4px solid #fff;
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

.nav li:hover, .nav li:nth-child(1)  { 
  color: #999;
  border-bottom: 2px solid #999;
}

@media (max-width:990px) {
  .nav {
    display: none;
  }
  
  
}
.gallery  {
  margin-top: 35px;
}

.gallery div {
  margin-bottom: 30px;
}

.gallery img {
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
  width: auto; 
  height: auto;
  cursor: pointer;
  max-width: 100%;
}
.inline_img{
		max-width: 100%;
		float: right;
		display: inline;
	}

</style>
<body>
<div class="container">
  <header>
  </header>
  <?php

session_start();
require 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '690453101307206', // Replace {app-id} with your app id
  'app_secret' => '8805ec51cb6b0acd3ca5a678ecca5133',
  'default_graph_version' => 'v3.1',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $responseUser = $fb->get('/me?fields=id,name,email,cover,gender,picture,link,birthday', $_SESSION['fb_access']);
  $responseImage = $fb->get('/me/picture?redirect=false&width=250&hight=250', $_SESSION['fb_access']);
  $responseI = $fb->get('/me/photos?fields=picture,name&type=uploaded&width=250&hight=250', $_SESSION['fb_access'])->getGraphEdge()->asArray();
  $albums = $fb->get('/me/albums', $_SESSION['fb_access'])->getGraphEdge()->asArray();
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
//$ii=$responseI->execute();
//$iii=$ii->getGraphObject();
$user = $responseUser->getGraphUser();
$image = $responseImage->getGraphUser();
$cover = $responseCover->getGraphUser(); 

 //$imagei = $albums->getGraphUser();

echo "<pre>";
//print_r($coverpic);
echo "<br>";
//print_r($cover);
//echo "1st user";
//print_r($user);
//echo "2nd image";
//print_r($image);
echo "<br>";
//echo "album";

echo "<br>";

//print_r($albums);
echo "<br>";
//echo "photo";

echo "<br>";
//print_r($responseI);
//print_r($iii);

//json_decode($user['cover'], true)['source'];
?>

<?php
//echo "<br><br>";
//echo '<p>Name: ' . $user['name']. '</p>';
//echo "<br>";
//echo "<p>Gender: " .$user['gender']."</p>";
//echo "<br>";
//echo '<p>Direct Link of FB page: ' . $user['link']. '</p>';
//echo "<br>";
$bd=$user['birthday'];
//print_r($bd);
$bd1=get_object_vars($bd);
//$birthday_test = $bd->getGraphUser();
//echo "<p>Birthdate: ".$bd1['date']. "</p>";

?>
  <main>
    <div class="row">
      <div class="left col-lg-4">
        <div class="photo-left">
          <img class="photo" src="<?=$image['url']?>"/>
          
        </div>
        <?php echo "<h4 class='name'>" .$user['name']."</h4>"; ?>
        <?php echo "<p class='info'>".$user['gender']."</p>"; ?>
        <p class="info">gajjarronak082@gmail.com</p>
        <div class="stats row">
          <div class="stat col-xs-4" style="padding-right: 50px;">
            <p class="number-stat">619</p>
            <p class="desc-stat">Followers</p>
          </div>
          <div class="stat col-xs-4">
            <p class="number-stat">42</p>
            <p class="desc-stat">Following</p>
          </div>
          <div class="stat col-xs-4" style="padding-left: 50px;">
            <p class="number-stat">38</p>
            <p class="desc-stat">Uploads</p>
          </div>
        </div>
        <p class="desc">Hi ! My name is Ronak Gajjar. I'm from Gandhinagar, in Gujarat. I really enjoy this.</p>
        
      </div>
      <div class="right col-lg-8">
        <ul class="nav">
          <li>Albums</li>
          
        </ul>
       
        <div class="row gallery">
          <div class="col-md-4">
             <?php  
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
            echo "<img src='{$photo['picture']}'/> ";
        }
?>
          </div>
<!--          <div class="col-md-4">
            <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774814-photo5.jpg"/>
          </div>
          <div class="col-md-4">
             <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774814-photo6.jpg"/>
          </div>
          <div class="col-md-4">
             <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774817-photo1.jpg"/>
          </div>
          <div class="col-md-4">
            <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774815-photo2.jpg"/>
          </div>
          <div class="col-md-4">
            <img src="https://image.noelshack.com/fichiers/2017/38/2/1505774816-photo3.jpg"/>
          </div>
        --></div>
      </div>
  </main>
</div>
</body>
</html>