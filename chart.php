<?PHP
	require_once("./include/membersite_config.php");
	date_default_timezone_set("America/Denver");
	$city = $fgmembersite->getCity();
	
	include 'dbconnect.php';
	$lat = $fgmembersite->getLat();
	$lon = $fgmembersite->getLon();
	$jsonObject = file_get_contents("https://maps.googleapis.com/maps/api/timezone/json?timestamp=0&sensor=true&location=".$lat.",".$lon."");
	$object = json_decode($jsonObject);

	$timezone=$object->timeZoneId;

	date_default_timezone_set($timezone);
	
	//$sql = "SELECT * FROM Events WHERE EstartDate >= '" . $today . "' ORDER BY EstartDate LIMIT 7;";
	//$result = mysqli_query($con, $sql);
?>
<link rel="stylesheet" type="text/css" href="css/chart.css" />

<script>
	function getByDayEvent(str) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("events").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "getByDayEvent.php?q=" + str, true);
			xmlhttp.send();
		}
</script>

<div class="box">
	<div class="row">
	<div class="cell">&nbsp;</div>
		<?PHP 
			for($ai = 0; $ai <= 6; $ai++){
				$date = strtotime("+$ai day", strtotime(date("m/d/Y")));
				
				$day = date("D", $date);
				
				$today = Date("m/d/Y", $date); //e.g., 02/03/2015
				
				$trimDate = date("m/d/Y", $date);
				$trimDate = substr($trimDate, 0, 5); //e.g., From 02/03/2015 to 02/03
		?>
			<div class="cell">
				<div class="circle"><!--Count of how many events the user has in their list.--><?= $today ?></div>
				<form><a onClick="getByDayEvent(this.value);" value="<?= $today ?>"><h4><?= $trimDate ?><br/><?= $day ?></h4></a></form>
			</div>
		<?PHP } ?>
	</div>

	<div class="chart" id="events"></div>
</div>

<div class="advertisement">
	<a href="#"><img src="images/advertisement_01.jpg" alt="Banner" /></a>
	<a href="#"><img src="images/advertisement_02.jpg" alt="Banner" /></a>
</div>
<div class="clear"></div>