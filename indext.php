<?php
session_start();
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
$dir = dir('files');
while ($file = $dir->read()) {
    if ($file != '.' && $file != '..') {
        $files[] = $file;
    }
}
$dir->close();
echo "test0";
$folder = new Google_DriveFile();
$folder->setTitle('test');
echo "test0";

//$folder->setDescription('This is a '.$mime_type.' document');
$folder->setMimeType('application/vnd.google-apps.folder');
echo "test0";

$createdFolder = $service->files->create($folder, array(
      'fields' => 'id',
  ));
echo "test0";

$permission = new Google_Permission();
  $permission->setValue('me');
  $permission->setType('anyone');
  $permission->setRole('writer');

 $service->permissions->insert($createdFolder->getId(), $permission);
echo "test0";

if (!empty($_POST)) {
    $client->setAccessToken($_SESSION['accessToken']);
    //$service = new Google_DriveService($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    //$file = new Google_DriveFile();
    foreach ($files as $file_name) {
        $file_path = 'files/'.$file_name;
        $mime_type = finfo_file($finfo, $file_path);
        //$file->setTitle($file_name);
        //$file->setDescription('This is a '.$mime_type.' document');
        //$file->setMimeType($mime_type);
        $service->files->insert(
            $createdFolder,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => $mime_type
            )
        );
    }
    finfo_close($finfo);
    header('location:'.$url);exit;
}
include 'index.phtml';
