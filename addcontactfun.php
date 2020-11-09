<?php
include_once('database.php');

class contact{
	//Function takes Employee ID and Contact and add them to the database to the table "contact"
	public static function add($ID,$contact)
	{
		
		$query_string = "Insert into contact values ({$ID},'{$contact}')";
		$statement = Database::$db->prepare($query_string);
		$statement->execute();
	}
	

}

?>