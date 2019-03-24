<?php
	
    include_once("connection.php");
    //var_dump($_POST);
    if($_POST)
    
	{
		$email = $_POST['email'];

		try
		{	
			$stmt = $db_con->prepare("SELECT * FROM members WHERE email=:email");
			$stmt->execute(array(":email"=>$email));
			$count = $stmt->rowCount();
			
			if($count==1)
				{
                    $stmt->bindParam(":email",$email);
					if($stmt->execute())
						{
                            echo "registered";
                            
                            //Initialize array variable
                            $dbdata = array();

                            //Fetch into associative array
                                while ( $row = $stmt->fetch(PDO::FETCH_OBJ) )  {
                                $dbdata[]=$row;
                                }
                            
                            //Print array in JSON format
                            $res = [ 'code' => 0, 'result' => $dbdata, 'msg' => 'Successfully Received Data' ];
                            echo json_encode($res);
						}
					else
						{
                            $res = [ 'code' => 3, 'result' => [], 'msg' => $db_con->errorInfo() ];
                            echo json_encode($res);
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
    else
				{
				echo "hi"; //  not available
				}
    
    
    //display
    ?>
