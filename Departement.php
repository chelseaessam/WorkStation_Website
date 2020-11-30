<?php
include_once('database.php');
class departement{
	//Function takes departement ID , name and its manager id and adds new departement in the departement table
	public static function add($Name,$ManagerFName,$ManagerLName)
	{
		

		$query_string="Select ID from employee where FirstName='{$ManagerFName}' and LastName='{$ManagerLName}'";
		$statement=Database::$db->prepare($query_string);
		$statement->execute();
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		$ManagerID=$row["ID"];

		$query_string = "INSERT INTO departement (Name,ManagerID) values ('{$Name}','{$ManagerID}') ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();

		$query_string="Select ID from departement where Name='{$Name}'";
		$statement=Database::$db->prepare($query_string);
		$statement->execute();
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		$DepartementID=$row["ID"];


		$query_string="UPDATE employee set DepID={$DepartementID} where employee.ID=${ManagerID}";
		$statement = Database::$db->prepare($query_string);
			$statement->execute();
			
			

	}
	
	

}
?>