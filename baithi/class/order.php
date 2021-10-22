<?php
class order{
        public function getAllOrder($cusID){
			require_once("../connection.php");
			$link = connect();
            $sql = "select * from `order` where CustomerID='$cusID'";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>0)				
			{		
				$dem=0;
				while($row=mysqli_fetch_array($result))
				{					
					$orderid = $row['OrderID'];
					$cusid = $row['CustomerID'];
					$date = $row['Date'];
					$total = $row['Total'];
					$note = $row['Note'];
				}
			}
        }
		public function getOrderDetail($orderid){
			require_once("../connection.php");
			$link = connect();
            $sql = "select * from `orderdetails` where OrderID='$orderid'";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>0)
			{			
				$dem=0;
				while($row=mysqli_fetch_array($result))
				{					
					$orderid = $row['OrderID'];
					$vegetid = $row['VegetableID'];
					$quantity = $row['Quantity'];
					$price = $row['Price'];
					$sql2 = "select * from vegetable where VegetableID='$vegetid'";			
            		$kq = mysqli_query($link,$sql2);
					$j = mysqli_num_rows($kq);
					if($j>0)
					{
						while($row1=mysqli_fetch_array($kq))
						{
							$name = $row1['VegetableName'];
							$image = $row1['Image'];
						}
					}
				}
			}
        }
		public function addorder($orderid,$cusid,$date,$total)
		{
			require_once("../connection.php");
			$link = connect();
            $sql = "insert into order (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) values ('$orderid','$cusid','$date','$total',NULL)";		
            mysqli_query($link,$sql);
		}
		public function addorderdetail($orderid,$vegetid,$quantity,$price)
		{
			require_once("../connection.php");
			$link = connect();
            $sql = "insert into orderdetail (`OrderID`, `VegetableID`, `Quantity`, `Price`) values ('$orderid','$vegetid','$quantity','$price');";		
            mysqli_query($link,$sql);
		}
    }
?>