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
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	body{
	
	
	background-image:url(00.png);
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position:center;
	position: relative;
	
	}
	img{
		height: 250px;
		width: 250px;
	}
	.inline_img{
		max-width: 100%;
		float: left;
		display: inline;
	}
	.not_inline{
		float: inherit;
	}
	p{
		font-size: 40px;
		font-weight: 200;
		font-style: bold;
	}
</style>
</head>
<body>
<img src="<?=$coverpic?>"/>
<img src="<?=$image['url']?>"/><div class="inline_img">
<?php  
foreach($responseI as $photo)
        {	
        	if ($i == 0) {
        		echo " <p> {$photo['name']} </p> ";
        	}
        	$i=$i + 1;
        	if ($photo['id'] == $cover['id']) {
        		echo "its cover yeey";
        		$coverpic = $photo['picture'];
        	}
        	//echo " <img src='{$photo['cover_photo']}'/>";
            //echo "  ";
            echo "<div class='inline_img'> <p> {$photo['id']} </p><img style='display: inline;' src='{$photo['picture']}'></div> ";
        }
?>
<br><br><div class="not_inline">
<?php
echo "<br><br>";
echo '<p>Name: ' . $user['name']. '</p>';
echo "<br>";
echo "<p>Gender: " .$user['gender']."</p>";
echo "<br>";
echo '<p>Direct Link of FB page: ' . $user['link']. '</p>';
echo "<br>";
$bd=$user['birthday'];
//print_r($bd);
$bd1=get_object_vars($bd);
//$birthday_test = $bd->getGraphUser();
echo "<p>Birthdate: ".$bd1['date']. "</p>";

?>
</div>
</body>
</html>

<?php 
//print_r($user['birthday']);
//print_r(json_decode($user['birthday'], true)['date']);
//echo json_decode($bd['birthday'],true)['date'];
//echo 'Email: ' . $user['email'];
 ?>


 