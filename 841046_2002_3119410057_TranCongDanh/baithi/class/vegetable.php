<?php
class vegetable {
	function getAll()
	{
		    require_once("../connection.php");
		    $link = connect();
            $sql = "select * from vegetable";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>0)
			{								
				while($row=mysqli_fetch_array($result))
				{					
					$id = $row['VegetableID'];
					$idcate = $row['CategoryID'];
					$name = $row['VegetableName'];
					$unit = $row['Unit'];
					$amount = $row['Amount'];
					$img = $row['Image'];
					$price = $row['Price'];
				}
			}
	}
	function getListByCate($cateid)
	{
		require_once("../connection.php");
		    $link = connect();
            $sql = "select * from vegetable where CategoryID='$cateid'";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>0)
			{								
				while($row=mysqli_fetch_array($result))
				{					
					$id = $row['VegetableID'];
					$idcate = $row['CategoryID'];
					$name = $row['VegetableNam'];
					$unit = $row['Unit'];
					$amount = $row['Amount'];
					$img = $row['Image'];
					$price = $row['Price'];
				}
			}
	}
	function getByID($vegetableID)
	{
		require_once("../connection.php");
		$link = connect();
            $sql = "select * from vegetable where VegetableID='$vegetableID'";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>0)
			{								
				while($row=mysqli_fetch_array($result))
				{					
					$id = $row['VegetableID'];
					$idcate = $row['CategoryID'];
					$name = $row['VegetableNam'];
					$unit = $row['Unit'];
					$amount = $row['Amount'];
					$img = $row['Image'];
					$price = $row['Price'];
				}
			}
	}
}
?>