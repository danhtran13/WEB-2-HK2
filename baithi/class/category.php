<?php 
    class category{
        public function getAll(){
			include("../connection.php");
			$link = connect();
            $sql = "select * from category";			
            $result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if($i>1)
			{								
				while($row=mysqli_fetch_array($result))
				{					
					$id = $row['CategoryID'];
					$name = $row['Name'];
					$description = $row['Description'];
				}
			}
        }
		public function addcate($name,$decription){
			include("../connection.php");
			$link = connect();
            $sql = "insert into category (`Name`, `Desciption`) values ('$name','$decription')";		
            mysqli_query($link,$sql);			
        }
    }

?>