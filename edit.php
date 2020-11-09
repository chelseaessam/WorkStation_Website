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
                Edit Employee
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
    $id=$_GET["empid"];
   include_once('database.php');
   include_once('addemployeefun.php');
   Database::connect("mydb","root","");
   $row=employee::edit($id);
   foreach($row as $emp)
   {
   	$id=$emp["ID"];
   	$fname=$emp["FirstName"];
   	$lname=$emp["LastName"];
   	$age=$emp["Age"];
   	$depid=$emp["DepID"];
   }
   ?>
   
    <form action="EditEmployee.php">
            <label class="col-md-2">Employee ID</label>
            <input type="number" name="ID" id="empid" value="<?php echo $id ?>" disabled>
            <br>
            
            <label class="col-md-2">First Name</label>
            <input type="text" name="FName" id="fname" value="<?php echo $fname ?>" disabled>
            <br>
            
            <label class="col-md-2">Last Name</label>
            <input type="text" name="LName" id="lname" value="<?php echo $lname ?>" disabled>
            <br>
            
            <label class="col-md-2">Age</label>
            <input type="number" name="Age" id="age" value="<?php echo $age ?>" >
            <br>
            
            <label class="col-md-2">Departement ID</label>
            <input type="number" name="DepID" value="<?php echo $depid ?>">
            <br>
            
            <label class="col-md-2">Contacts</label>
            <?php
            $contactno=0;
            foreach($row as $emp)
            {
            $contact=$emp["contacts"];
            if($contactno==0)
            echo "<input type='text' name='$contactno' value='$contact'>";
            else
            echo "<input type='text' name='$contactno' value='$contact'class='contacts'>";

            echo "<br>";
            $contactno=$contactno+1;
             }
             echo"<input type='number' name='contactno' value='$contactno' style='display: none'>";

            ?>
            <br>

            <input type="number" name="ID" id="empid" value="<?php echo $id ?>" style="display :none;">

           <button type="submit" class=" btn btn-secondary col-md-2" id="addButton" >Edit</button>
            
        </form>
  
  

	
	</body>

	</html>