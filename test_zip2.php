<?php  

$files = array(
    'https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/32116564_822064857996304_5296331297495449600_o.jpg?_nc_cat=0&oh=e0fc3c269131f741ea0adb1766d8a676&oe=5C007C75',
    
);
//$im = imagecreatefromwebp($files[0]);

// Convert it to a jpeg file with 100% quality
//imagejpeg($im, $files[0], 100);
# create new zip object
$zip = new ZipArchive();

# create a temp file & open it
$tmp_file = tempnam('.', '');
$zip->open($tmp_file, ZipArchive::CREATE);

# loop through each file
foreach ($files as $file) {
    # download file
    $download_file = file_get_contents($file);

    #add it to the zip
    $zip->addFromString(basename($file), $download_file);
}

# close zip
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename="my file.zip"');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);

?>