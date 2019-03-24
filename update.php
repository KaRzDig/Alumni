<?php
require "connection.php"; 


$name=$_POST['name'];
$password=$_POST['password'];
$id=$_POST['email'];

$sql=$dbo->prepare("update members set name=:name,password=:password where email=:email");
$sql->bindParam(':name',$name);
$sql->bindParam(':password');
$sql->bindParam(':id',$id);

if($sql->execute()){
echo "Successfully updated Profile";
}
else{
print_r($sql->errorInfo());
$msg=" Database problem, please contact site admin ";
}
?>