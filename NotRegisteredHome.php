<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="css/Home.css">
    <Title>
        Welcome
    </Title>
    </head>
    
    <body>
        <div>
            <!--first navigation bar!-->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a class="navbar-brand">
                Welcome
                </a>
            </nav>
            <!--Content!-->
                <div class="title">
                    Log in 
                </div>
                <!-- login form!-->
            <form class="title" action="Home.php" onsubmit="return validate();" method="POST">
                <label class="col-md-2" >Email</label>
                <input type="text"placeholder="someone@email.com" name="email"id="userEmail"><p id="emailcomment">There is no account linked to this email</p>
                <br>
                <label class="col-md-2">Password</label>
                <input type="password" placeholder="password"name="password" id="userPass" ><p id="passwordcomment"></p>
                <br>
                <button type="submit" class=" btn btn-secondary col-md-2" >Sign In</button>
            </form>
            
            <p class="title">Don't have any account? Register <a id="link"href="Register.html">here</a></p>
        </div>
        <script type="text/javascript">
            //Function validates email and password fields
            function validate(){
                var rightemail=true;
                var rightpass=true;
                //checking if email field is empty 
                if($("#userEmail").val()=='')
                  {
                    $("#emailcomment").text("Email can't be empty");
                    rightemail=false;
               }
               //checking if password field is empty
               if($("#userPass").val()=='')
               {
                $("#passwordcomment").text("Password can't be empty");
                rightpass=false;
               }
               //checking if email field is valid ie contains either (@gmail.com )or (@hotmail.com)
               if($("#userEmail").val()!='')
               {
                if($("#userEmail").val().includes("@gmail.com")==false && $("#userEmail").val().includes("@hotmail.com")==false)
                {
                $("#emailcomment").text('Invalid Email');
                rightemail=false;
                }
               }
               //checking if password length more than 8 characters
             if($("#userPass").val()!='' &&$("#userPass").val().length<8)
             {
                $("#passwordcomment").text("Password must be at least 8 characters");
                rightpass=false;
             }

               if(rightemail)
               {
                $("#emailcomment").text('Email confirmed');
               }
               if(rightpass)
               {
                $("#passwordcomment").text('Password confirmed');
               }
                if(rightemail&&rightpass)
                     return true;
                 else
                    return false;
            }
        </script>
        
    </body>
</html>