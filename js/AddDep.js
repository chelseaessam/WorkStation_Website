            //function checks if Departement ID field is empty , if so the form is not submitted
            function validate(){
                var rightname=true;
                var rightmanagerfirstname=true;
                var rightmanagerlastname=true;
                
                if($("#name").val()=='')
                {
                    $("#namecomment").text("Departement name can't be empty");
                    rightname=false;
                }

                if($("#managerfirstname").val()=='')
                {
                    $("#managerfirstnamecomment").text("Manager First Name can't be empty");
                    rightmanagerfirstname=false;
                }
                if($("#managerlastname").val()=='')
                {
                    $("#managerlastnamecomment").text("Manager Last Name can't be empty");
                    rightmanagerlastname=false;
                }
               
                if(rightname)
                {
                $("#namecomment").text("Departement name confirmed");
                }
                if(rightmanagerfirstname)
                {
                    $("#managernamecomment").text("Manager First Name confirmed");
                }
                if(rightmanagerlastname)
                {
                    $("#managerlastnamecomment").text("Manager Last Name confirmed");
                }
                if(rightname&&rightmanagerfirstname&&rightmanagerlastname)
                {
                    return true;
                }
                else
                    return false;
            }
                