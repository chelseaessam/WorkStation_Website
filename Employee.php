<?php
include_once('database.php');
class employee{
	//Function take employee ID , first name , last name , age and departement ID and add new employee in table employee
	public static function addEmployee($FName,$LName,$Age,$DepName)
	{
		if($DepName=='')
		{
		$query_string = "INSERT INTO employee (FirstName,LastName,Age) values ('{$FName}','{$LName}',{$Age}) ";
		}
		else
		{
			$query_string="Select ID from departement where Name='{$DepName}'";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			$DepID=$row["ID"];
			$query_string = "INSERT INTO employee (FirstName,LastName,Age,DepID) values ('{$FName}','{$LName}',{$Age},{$DepID}) ";

      }
		
			$statement = Database::$db->prepare($query_string);
			$statement->execute();

			

	}
	public static  function getID($FName,$LName,$age,$DepName)
	{
		$query_string;
		if($DepName=='')
		{
		 $query_string ="select ID from employee where FirstName='{$FName}' and LastName='{$LName}'and Age={$age}";
		}
		else
		{
			$query_string="Select ID from departement where Name='{$DepName}'";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			$Depid=$row["ID"];
			$query_string ="select ID from employee where FirstName='{$FName}' and LastName='{$LName}'and Age={$age} and DepID={$Depid}";

      }



		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		$row=$statement->fetch(PDO::FETCH_ASSOC);
        return $row["ID"];



	}
	public static function addContact($ID,$contact)
	{
		$query_string = "INSERT INTO contact values ({$ID},'{$contact}') ";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();

			

	}
	public static function editEmployee($ID)
	{
		$query_string="Select e.ID, FirstName,LastName,Age,d.Name,contacts 
		from employee e left join departement d
		on e.DepID=d.ID
		left join contact c
		on e.ID=c.EmpID
		where e.ID={$ID}";
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
	public static function updateEmployee($ID,$age,$DepName)
	{
		$query_string = "Update employee set Age={$age} where ID={$ID} ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		if($DepName=='')
			return;
		else
		{
			$query_string="Select ID from departement where Name='{$DepName}'";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			$Depid=$row["ID"];
		
		    $query_string = "Update employee set DepID={$Depid} where ID={$ID} ";
		    $statement = Database::$db->prepare($query_string);
		    $statement->execute();

	}
}

	public static function updateContact($ID,$contact,$oldcontact)
	{
		$query_string = "Update contact set contacts='{$contact}' where EmpID={$ID} and contacts='{$oldcontact}' ";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		
		

	}
	public static function getContact($ID)
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
	//Function search for all employees from employee table and contact table given parameter (ie field) and the required value 
	public static function result($parameter,$value)
	{
		if ($parameter=="contacts")
		{$query_string = "select e.ID,e.FirstName,e.LastName,e.Age,d.Name,c.contacts 
		from employee e left JOIN contact c 
		on e.ID=c.EmpID 
		left Join departement d
		On e.DepId=d.ID
		where c.{$parameter}='{$value}'";}
		else if ($parameter=="Name")
		{
		$query_string = "select e.ID,e.FirstName,e.LastName,e.Age,d.Name,c.contacts 
		from employee e left JOIN contact c 
		on e.ID=c.EmpID 
		left join departement d
		On e.DepID=d.ID
		where d.{$parameter}='{$value}'";

		}
		else
		{$query_string = "select e.ID,e.FirstName,e.LastName,e.Age,d.Name,c.contacts 
		from employee e left JOIN contact c 
		on e.ID=c.EmpID 
		left join departement d
		On e.DepID=d.ID
		where e.{$parameter}='{$value}'";}
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		$emp=[];
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		while($row!=false)
		{
			$emp[]=$row;
			$row=$statement->fetch(PDO::FETCH_ASSOC);
		}
		return $emp;

	}
	public static function All()
	{
		
		$query_string = "select e.ID,e.FirstName,e.LastName,e.Age,d.Name,c.contacts 
		from employee e left JOIN contact c 
		on e.ID=c.EmpID 
		left join departement d
		On e.DepID=d.ID";
		
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
		$emp=[];
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		while($row!=false)
		{
			$emp[]=$row;
			$row=$statement->fetch(PDO::FETCH_ASSOC);
		}
		return $emp;

	}
	

}

?>