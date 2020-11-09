<?php
include_once('database.php');

class employee{
	//Function take employee ID , first name , last name , age and departement ID and add new employee in table employee
	public static function add($ID,$FName,$LName,$Age,$DepID)
	{
		if($DepID=='')
		{
			$DepID='NULL';
		}
		$query_string = "INSERT INTO employee values ('{$FName}','{$LName}',{$ID},{$Age},{$DepID}) ";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();
			
			

	}
	public static function contact($ID,$contact)
	{
		$query_string = "INSERT INTO contact values ({$ID},'{$contact}') ";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();

			

	}
	public static function edit($ID)
	{
		$query_string="Select ID, FirstName,LastName,Age,DepID,contacts from employee e join contact c on e.ID=c.EmpID where e.ID={$ID}";
		$statement=Database::$db->prepare($query_string);
		$statement->execute();
		$result=[];
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		while($row!=false)
		{
			$result[]=$row;
		    $row=$statement->fetch(PDO::FETCH_ASSOC);

		}
		return $result;

	}
	public static function updateEmp($ID,$age,$DepID)
	{
		$query_string = "Update employee set Age={$age} where ID={$ID} ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		
		$query_string = "Update employee set DepID={$DepID} where ID={$ID} ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();

	}

	public static function updatecontact($ID,$contact,$oldcontact)
	{
		$query_string = "Update contact set contacts='{$contact}' where EmpID={$ID} and contacts='{$oldcontact}' ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		
		

	}
	public static function getcontact($ID)
	{
		$query_string = "select contacts from contact where EmpID={$ID} ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		$contact=[];
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		while($row!=false)
		{
			$contact[]=$row;
			$row=$statement->fetch(PDO::FETCH_ASSOC);
		}
		return $contact;
	// public static function updatecontact($ID,$oldcontact,$newcontact)
	// {

	// }
	}

}

?>
