<ul>

   <?PHP
	require_once("./include/membersite_config.php");
		$city = $_GET['city'];
		
	if(isset($_POST["submitted"])){
		$result = $fgmembersite->searchEvent();
	}
	
	
	$con = mysqli_connect('localhost', 'admindev', '17s_9Eyr', 'EventAdvisors');
	
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con, "EventAdvisors");

	
$sql = "SELECT * FROM Events WHERE Ecity = ' " . $city . " ' ORDER BY EstartDate";
$result = mysqli_query($con, $sql);

						$i = 0;
						while($row = mysqli_fetch_array($result)){
						
						//day name of the date	
						$today= date("m/d/Y");
						$dt = strtotime($row['EstartDate']);
						$day = date("l", $dt);
						if ($today===$row['EstartDate']){
							$day="Today";}
							
							
					?>            	
            	
                	<li>
                    	<div class="info">
                        	<div class="box">
                                <a href="#" class="btn-cross"><img src="images/btn_cross.png" alt="Cross" /></a>
                                <h1><?=$day?></h1>
                                <p> <?=substr($row['EstartDate'], 0, 5);?>, <?= $row['Etime'] ?></p>
                                <h1><?= $row['Evename'] ?></h1>
                            </div>
                        </div>
                    	<img src="<?= $row['Eflyer'] ?>" alt="Image" />
                    </li>
                    
                  <?PHP $i++; } ?>  
                                        
                    <div class="clear"></div>
                </ul>