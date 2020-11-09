<?php
include_once('database.php');

class departement{
	//Function takes departement ID , name and its manager id and adds new departement in the departement table
	public static function add($ID,$Name,$ManagerID)
	{
		if($Name=='')
		{
			$Name=NULL;
		}
		if($ManagerID=='')
		{
			$ManagerID='NULL';
		}
		$query_string = "INSERT INTO departement values ({$ID},'{$Name}',{$ManagerID}) ";
			$statement = Database::$db->prepare($query_string);
			$statement->execute();

		$query_string="UPDATE employee set DepId={$ID} where employee.ID=${ManagerID}";
		$statement = Database::$db->prepare($query_string);
			$statement->execute();
			
			

	}
	

}

?>
