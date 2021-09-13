<?php 
    class Customer{
        public function getByid($cusid){
			require_once("../connection.php");
			$link = connect();
            $sql = "select * from customers where CustomerID='$cusid'";		
            $ketqua = mysqli_query($link,$sql);
			$i = mysqli_num_rows($ketqua);
			if($i==1)
			{								
				while($row=mysqli_fetch_array($ketqua))
				{					
					$password = $row['Password'];
					$name = $row['Fullname'];
					$address = $row['Address'];
					$city = $row['City'];
				}
			}
        }
		public function addcus($pass,$name,$address,$city){
			require_once("../connection.php");
			$link = connect();
            $sql = "insert into customers (`CustomerID`, `Password`, `FullName`, `Address`, `City`) values (NULL,'$pass','$name','$address','$city');";		
            mysqli_query($link,$sql);			
        }
    }
?>