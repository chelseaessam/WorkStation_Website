<?php
include_once('database.php');
Database::connect("newdb","root","");
$email=$_POST["email"];
$password=$_POST["password"];
//checking if user is registered ie has email in the database
$query_string="Select *from credentials where email='{$email}'";
$statement = Database::$db->prepare($query_string);
$statement->execute();
$row=$statement->fetch(PDO::FETCH_ASSOC);
//if user is not register , he will be directed to the same login page to log in again
if($row==false)
{header('Location:NotRegisteredHome.php',true);
exit();
}
// if user is registered with the given email ,check if his password is right
else{
	$query_string="Select password from credentials where email='{$email}'";
	$statement = Database::$db->prepare($query_string);
    $statement->execute();
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    //if user enters the right password he will be directed to the home page
    if($row["password"]==$password)
    {
    	header('Location:WelcomeHome.php',true);
    	exit();
    }
    //if user enters the wrong password , he will be directed to the login page to enter his password again
else{
	header('Location:WrongPasswordHome.php',true);
	exit();
}
}
?>
