<?PHP	
		require_once("./include/membersite_config.php");

		if(!$fgmembersite->CheckSession()){
			$fgmembersite->RedirectToURL("./index.php");
			exit;
		}
		$usrname = $fgmembersite->UsrName();
		
		
		$newEventID = $_GET['eid'];
		include 'dbconnect.php';

		
		$sql = 'INSERT Eid INTO "' .$usrname.'"MyEvents VALUES("'.$newEventID.'");';
		$result = mysqli_query($con, $sql);
		
		mysqli_close($con);
?>