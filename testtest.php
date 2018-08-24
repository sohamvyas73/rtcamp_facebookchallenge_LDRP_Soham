<!DOCTYPE html>
<html>
<head>
	

<link rel="stylesheet" type="text/css" href="pop.css">
<style type="text/css">
	
body{
   font-family: 'Mukta', sans-serif;
  margin: 0px;
}
.overlay {

  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: visible;
  opacity: 0;
}
.overlay:target {
  vertical-align: middle;
  width: 100%;
  height: 100%;
  visibility: visible;
  opacity: 1;
}

.popup {
  vertical-align: middle;
  margin: 0px auto;
  padding: 30px;
  background: #fff;

  border-radius: 5px;
  width: 30%;
  position: relative;
  top : 230px;
  transition: all 5s ease-in-out;
}
@media screen and (max-width: 768px){
  .popup {
  vertical-align: middle;
  margin: 0px 5px;
  padding: 10px;
  background: #fff;

  border-radius: 5px;
  width: 50%;
  position: relative;
  top : 180px;
  transition: all 5s ease-in-out;
}
}
.popup h2 {
  margin-top: 0;
  color: #333;
 
}
.popup .close {
  position: absolute;
  top: -15px;
  right: 5px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {

  overflow: visible;
}
@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 80%;
  }
}

* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>
	<input type="submit" style="background-image:url(5.jpg); border:none;   
 width:100px;height:100px; color:transparent;" value="submit" name="submit_value"/>
<!--	<button onclick="cl()">ss</button>
	<button onclick="cl()">ss</button>
	<button onclick="cl()">ss</button>
	<button onclick="cl()">ss</button>
 <button onclick="myFunction()">Click me</button>
--> <p id="demo"></p>
 <script>
	function cl() {	
    document.getElementById('popup1').style.opacity=1;
}
function myFunction() {
  document.getElementById("demo").innerHTML = "Hello World";
}
</script>
 <div class="pop" id="popup1">
<div class="overlay">
    <div class="popup">
        <div class="row">
        
        <center>Please Login to your Facebook Account.
        <a class="close" href="#">&times;</a>
        <div class="content">
            
      <a href="login.php"><button class="loginBtn loginBtn--facebook">
  Login with Facebook
</button></a></div></center>
        
      
        </div></div>
    </div>
</div>

</body>

</html>