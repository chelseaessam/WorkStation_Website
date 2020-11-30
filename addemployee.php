<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="css/AddEmp.css">
	<title>Add Employee</title>
</head>
<body>
    <!--first navigation bar!-->
 <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="col-md-9">
                <a class="navbar-brand">
                Add Employee
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
	<?php

	    //connecting to the database and adding new employee 
        include_once("Employee.php");
		include_once("database.php");
		Database::connect("newdb", "root", "");
        employee::addEmployee($_GET["FName"],$_GET["LName"],$_GET["Age"],$_GET["DepName"]);
        $contactno=$_GET["contactno"];
        $id=employee::getID($_GET["FName"],$_GET["LName"],$_GET["Age"],$_GET["DepName"]);
        echo "em id is ".$id;
        for($i=1;$i<=$contactno;$i++){
            employee::addContact($id,$_GET[$i]);
        }
		
		echo"Employee added successfully";




		
	?>
	
</body>
</html>