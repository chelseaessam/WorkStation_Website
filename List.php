<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="css/List.css">
	<title>Employees</title>
</head>
<body>
	<?php 
	include_once("database.php");
	include("Employee.php");
	Database::connect("newdb", "root", "");
//changing search criteria from the displayed name on the website to the name given in tables in the database
	$var=$_GET["parameter"];
	if($var=="All")
	{
		$results=employee::All();
	
	}
	else
	{
	switch($var){
		case"Employee ID":
		$parameter="ID";
		break;

		case "First Name":
		$parameter="FirstName";
		break;

		case "Last Name":
		$parameter="LastName";
		break;

		case "Age":
		$parameter="Age";
		break;

		case "Departement Name":
		$parameter="Name";
		break;

		case "Contact":
		$parameter="contacts";
		break;
	}
	$results=employee::result($parameter,$_GET["value"]);
}
	

	?>
	<!-- first navigation bar!-->

             <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="col-md-9">
                <a class="navbar-brand">
                Employees
                </a>
                </div>

                <div class="col-md-3">
                <a class="navbar-brand">
                    <i class="far fa-user-circle"></i> Hi
                    &nbsp;
                    <a type="button" class="navbar-brand" href="Home.html">Logout</a>
                    
                </a>
                </div>
                
            </nav>
        <!--second navigation bar!-->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a class="btn navbar-brand" href="AddEmp.html" >Add Employee</a>
            <a class="btn navbar-brand" href="AddDep.html">Add Departement</a>
            <a class="btn navbar-brand" href="List.html">Employees</a>

            
        </nav>
        &nbsp;
        <!-- result of search is displayed as table of employee attributes!-->
	<table class="mytable">
		<tr>
		<th >Employee ID</th>
		<th >First Name</th>
		<th >Last Name</th>
		<th >Age</th>
		<th >Departement Name</th>
		<th>Contact</th>
	</tr>
		<?php
		
		foreach($results as $row)
		{
			$id=$row["ID"];
			echo"<tr>";
			echo "<td>".$row["ID"]."</td>";
			echo "<td>".$row["FirstName"]."</td>";
			echo "<td>".$row["LastName"]."</td>";
			echo "<td>".$row["Age"]."</td>";
			echo "<td>".$row["Name"]."</td>";
			echo"<td>".$row["contacts"]."</td>";
			echo "<td>"."<a class='button' href='edit.php?empid=" . $id . "'>edit</a>"."</td>";
			echo "</tr>";
			

		}
		?>

	</table>
	
	</body>

	</html>