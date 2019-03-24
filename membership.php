<?php
	
	include_once("connection.php");
	if($_POST)
	{
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $year_of_passout = $_POST['year_of_passout'];
        $current_location = $_POST['current_location'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
		$email = $_POST['email'];
        $con_password = $_POST['con_password'];
		$salt = '1'; //= $POST['salt'];
		$status_flag = '0';
		$application_date =date('Y-m-d H:i:s');
		
		$password = md5($con_password);
		
		try
		{	
			$stmt = $db_con->prepare("SELECT * FROM members WHERE email=:email");
			$stmt->execute(array(":email"=>$email));
			$count = $stmt->rowCount();
			
			if($count==0)
				{
				$stmt = $db_con->prepare("INSERT INTO members(first_name,middle_name,last_name,year_of_passout,
				current_location,address,phone_number,email,con_password,salt,status_flag,application_date) 
				VALUES(:first_name, :middle_name, :last_name, :year_of_passout, :current_location, :address, 
				:phone_number, :email, :con_password, :salt, :status_flag, :application_date)");
				$stmt->bindParam(":first_name",$first_name);
				$stmt->bindParam(":middle_name",$middle_name);
				$stmt->bindParam(":last_name",$last_name);
				$stmt->bindParam(":year_of_passout",$year_of_passout);
				$stmt->bindParam(":current_location",$current_location);
				$stmt->bindParam(":address",$address);
				$stmt->bindParam(":phone_number",$phone_number);
				$stmt->bindParam(":email",$email);
				$stmt->bindParam(":con_password",$password);
				$stmt->bindParam(":salt",$salt);
				$stmt->bindParam(":status_flag",$status_flag);
				$stmt->bindParam(":application_date",$application_date);
			
					if($stmt->execute())
						{
							echo "registered";
						}
					else
						{
							echo "Query could not execute !";
						}
				}
			else
				{
				echo "1"; //  not available
				}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>