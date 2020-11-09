<?php
include_once('database.php');
Database::connect("mydb","root","");
$email=$_POST["email"];
$password=$_POST["password"];
//checking if user is registering with email that exists already in the database
$query_string="Select * from credentials where email='{$email}'";
$statement = Database::$db->prepare($query_string);
$statement->execute();
$row=$statement->fetch(PDO::FETCH_ASSOC);
//if email given for registeration is not registered before
if($row==false)
{$query_string="INSERT INTO credentials (email,password) values ('{$email}','{$password}')";
$statement = Database::$db->prepare($query_string);
$statement->execute();
//directing new user to the home page
header('Location: WelcomeHome.php',true);
exit();}
//if user is trying to register with email that already exists in the database , he stays in the register page to enter new email
else
{
header('Location: AlreadyRegister.php',true);
exit();
}
?>
        
          