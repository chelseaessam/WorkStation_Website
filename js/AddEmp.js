        //function to add new box for "contact" field on pressing the "plus"button
        var contactno=1;
       function clicked(){
            contactno=contactno+1;
            $("#myform").append('<input type="text" class="col-md-2" name="'+contactno+'"><br>');
            document.getElementById("hiddenNo").value=contactno;

           }
        //function to validate that ID , first name , last name and age fields are not empty before submitting the form
       function validate()
       {
            var rightfname=true;
            var rightlname=true;
            var rightage=true;
           
             if($("#fname").val()=='')
            {
                rightfname=false;
                $("#fnamecomment").text("First Name can't be empty");
            }
             if($("#lname").val()=='')
            {
                rightlname=false;
                $("#lnamecomment").text("Last Name can't be empty");
            }
             if($("#age").val()=='')
            {
                rightage=false;
                $("#agecomment").text("Age can't be empty");
            }
           
            if(rightfname)
            {
                $("#fnamecomment").text("First Name confirmed");
            }
           
            if(rightlname)
            {
                $("#lnamecomment").text("Last Name confirmed");
            }
            if(rightage)
            {
                $("#agecomment").text("Age confirmed");
            }
            if(rightfname&&rightlname&&rightage)
            
               {return true;} 
            
            else {return false;}
        
       }



