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

$album_selected=$_SESSION['album_selected'];
$post = $_POST;
//echo "<pre>";
foreach ($albums_photos as $album_name) {
              
              //print_r($album_name['name']);
                if (in_array($album_name['name'], $album_selected)) {
                    # code...
                   
              // echo "<h1>" .$album_name['name']. "</h1>"; 
                 $current_id=$album_name['id'];
                 $var_name[]=$album_name['name'];
                 //echo $current_id;
                 $al_zip[$album_name['name']] = $fb->get("/".$current_id."/photos?fields=source", $_SESSION['fb_access'])->getGraphEdge()->asArray();
             }

}

//print_r($al_zip);

for ($j=0; $j <sizeof($al_zip) ; $j++) {
        
        for ($i=0; $i <sizeof($al_zip[$var_name[$j]]) ; $i++) {
                  //$var_name = $al_zip['name'];
                  ${$var_name[$j]}[]=$al_zip[$var_name[$j]][$i]['source'];
                
                }
                $zip_image[]= ${$var_name[$j]};

}
//echo "<pre>";
//print_r($zip_image);


$zipname = './move_custom/album.zip';
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

$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
$client = new Google_Client();
$client->setClientId('560862522123-fpcuocttd5qsubcth6hfg8t1376f5i59.apps.googleusercontent.com');
$client->setClientSecret('Crn1TXNj-NTd-Dot1KpQ1-MY');
$client->setRedirectUri($url);
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}
$service= new Google_DriveService($client);
$files= array();
$dir = dir('move_custom');
while ($file = $dir->read()) {
    if ($file != '.' && $file != '..') {
        $files[] = $file;
    }
}
$dir->close();

if (isset($_POST['submit'])) {
    $client->setAccessToken($_SESSION['accessToken']);
    $service = new Google_DriveService($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file = new Google_DriveFile();
    foreach ($files as $file_name) {
        $file_path = 'move_custom/'.$file_name;
        $mime_type = finfo_file($finfo, $file_path);
        $file->setTitle($file_name);
        //$file->setDescription('This is a '.$mime_type.' document');
        $file->setMimeType($mime_type);
        $service->files->insert(
            $file,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => $mime_type
            )
        );
    }
    finfo_close($finfo);
    header('location:'.$url);exit;
}
if (isset($_POST['home'])) {
    # code...
unlink($zipname);

echo "<script type='text/javascript'>window.location='profile_latest0.php'</script>";

}
include 'move.phtml';

 ?>