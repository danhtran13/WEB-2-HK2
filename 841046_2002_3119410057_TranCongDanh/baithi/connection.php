<?php
function connect()
{
	$con = mysqli_connect("localhost", "root", "", "market");
	if(!$con) {
		echo "Kết nối không thành công";
		exit();
		}
		else{
			mysqli_query($con,"SET NAMES UTF8");
			return $con;
		}
}
?>