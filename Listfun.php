<?php
include_once("database.php");
class myList{
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