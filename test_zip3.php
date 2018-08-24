<?php  

function grab_image($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
    
    echo "function complete";
    return $raw;
}
echo "function called";
$s='test for zip
/image.jpg';
$urli='https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/32116564_822064857996304_5296331297495449600_o.jpg?_nc_cat=0&oh=e0fc3c269131f741ea0adb1766d8a676&oe=5C007C75';
$image=grab_image($urli,$s);
print_r($image);
?>