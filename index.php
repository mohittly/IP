<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UI/UX - 4 COLOR CHANGE</title>
	<!--Initialising css folders-->
	<link rel="stylesheet" href="css/materialize.min.css">

	<!--Initialising javascript folders-->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/extra.js"></script>

	<!--Initialising icon font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
	    $(document).ready(function(){
		    $('.modal').modal();
        document.getElementById('first').value = "";
	  	});
  	</script>
</head>
<body>



<?php
$http_client_ip = getenv('HTTP_CLIENT_IP');
$http_x_forwarded_for = getenv('HTTP_X_FORWARDED_FOR');
$remote_addr = getenv('REMOTE_ADDR');

if(!empty($http_client_ip))
{
	$ip_address = $http_client_ip;
}
else if(!empty($http_x_forwarded_for))
{
	$ip_address = $http_x_forwarded_for;
}
else
{
	$ip_address = $remote_addr;
}

 $location = file_get_contents('http://freegeoip.net/json/'.$ip_address);
 $json = json_decode($location,true);
 $country = $json['country_name'];
 $region = $json['region_name'];
 $city = $json['city'];
 $zone = $json['time_zone'];
 $lat = $json['latitude'];
 $long = $json['longitude'];

  $country1 = "";
   $region1 = "";
   $city1 = "";
   $zone1 ="";
   $lat1 = "";
   $long1 = "" ;
   $ip = "" ;

if(isset($_POST['submit']))
{
  $ip = $_POST['first'];
  $location1 = file_get_contents('http://freegeoip.net/json/'.$ip);
  if($location1 != "")
  {
  $json1 = json_decode($location1,true);
   $country1 = $json1['country_name'];
   $region1 = $json1['region_name'];
   $city1 = $json1['city'];
   $zone1 = $json1['time_zone'];
   $lat1 = $json1['latitude'];
   $long1 = $json1['longitude'];
 }

}

$_POST = array();

echo "
<br><br>
<div class='row'>
  <div class='col s12 m6'>
      <span class='flow-text' style='font-size:200%;color:white'><center>Your IP Address Is <b>$ip_address</b></center><br> </span>
      <center><span class='new'>Country : $country</span><br><br></center>
      <center><span class='new'>Region : $region</span><br><br></center>
      <center><span class='new'>City : $city</span><br><br></center>
      <center><span class='new'>Zone : $zone</span><br><br></center>
      <center><span class='new'>Latitude : $lat</span><br><br></center>
      <center><span class='new'>Longitude : $long</span><br><br></center>
  </div>
  


	  
	 
 




	 ";
# print_r($location);




?>

  <div class='col s12 m6'>
      <span class='flow-text' style='font-size:200%;color:black'><center>Enter someone else's IP Address Below</center><br> </span>
      <form action='<?=$_SERVER['PHP_SELF']; ?>' method='post'>
      <div class='row'>
          <div class='input-field col s12'>
            <input id='first' type='text' name='first' style="color:white;font-size:300%;text-align:center">
          </div>
      </div>
      <center><input type='submit' name='submit'/></center>
      </form>
      <?php 
          if($location1 == "")
          {
              echo "<center><span class='new1'>Incorrect IP Address</span><br><br></center>";
          }
          else
          {
              echo "<center><span class='new1'>IP Address : $ip</span><br><br></center>"; 
          }
      ?>
      <center><span class='new1'>Country : <?php echo $country1 ?> </span><br><br></center>
      <center><span class='new1'>Region : <?php echo $region1 ?> </span><br><br></center>
      <center><span class='new1'>City : <?php echo $city1 ?> </span><br><br></center>
      <center><span class='new1'>Zone : <?php echo $zone1 ?> </span><br><br></center>
      <center><span class='new1'>Latitude : <?php echo $lat1 ?> </span><br><br></center>
      <center><span class='new1'>Longitude :  <?php echo $long1 ?> </span><br><br></center>
  </div>

  </div>
      
  

</body>
</html>