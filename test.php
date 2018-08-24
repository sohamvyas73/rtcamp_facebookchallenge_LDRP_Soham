<?php 
require 'conn.php';
$Username = $_POST["user_name"];
$Password = $_POST["password"];
$mysql_qry = "select Username from user where Username= '$Username' and Password= '$Password';";
$result = mysqli_query($connect ,$mysql_qry);
if(mysqli_num_rows($result) > 0) {
echo "login success !!!!! Welcome user";
}
else {
echo "login not success";
}?>
<?php 
$connect=mysqli_connect("localhost","id6340381_root","7642634892","id6340381_login_app");

?>