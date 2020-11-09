<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="css/List.css">
    <link rel="stylesheet" href="css/AddEmp.css">

	<title>Employees</title>
</head>
<body>
	
	<!-- first navigation bar!-->

             <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="col-md-9">
                <a class="navbar-brand">
                Employee Edited
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
   include_once('database.php');
   include_once('addemployeefun.php');
   Database::connect("mydb","root","");
    $id=$_GET["ID"];
    $depid=$_GET["DepID"];
    $age=$_GET["Age"];
    $contactno=$_GET["contactno"];
    employee::updateEmp($id,$age,$depid);
    $contact=employee::getcontact($id);
    for($i=0;$i<$contactno;$i++)
    {
      $newcontact=$_GET[$i];
      $oldcontact=$contact[$i]["contacts"];
      employee::updatecontact($id,$newcontact,$oldcontact);

    }    
    echo "Employee edited successfully "
    
   ?>
	
	</body>

	</html>