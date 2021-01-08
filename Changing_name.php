<?php include 'mysql.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css.css">
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="login-page">
  <div class="form">
    <div class="login-form">
      <h5>Change the name</h5>
      <input type="text" placeholder="first_name"  id="first_name" />
      <input type="text" placeholder="Last_name"  id="Last_name" />
      <button id="insert">Insert</button>
     <p class="message">If you change the name twice, it cannot be changed until after one week</p>
     <p id="text_yes">
     </p>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">


	$(document).ready(function(){
      $(document).on('click','#insert',function(){

           var first_name=$("#first_name").val();
           var Last_name=$("#Last_name").val();

           if (first_name != "" && Last_name!= "") 
           {

           var The_number_of_times = 1;

           $.ajax({
               url:"update_name.php",
               type:"post",
               data:{first_name:first_name,Last_name:Last_name,The_number_of_times:The_number_of_times},
               success:function(data)
               {
                if (data == "Not_possible")
                {
                  $(".message").html('<h6 style="text-align: center;color:red;">The name can only be added after a week</h6>');
                
                    update_count_change()

                }

               if (data == "Updated")
                {
                  $(".message").html('<h6 style="text-align: center;color:blue;">Name added</h6>');
                }

               }
           });
            }else{
                  $(".message").html('<h6 style="text-align: center;color:red;">Please enter the name</h6>');
            }
         });
    	});

  function update_count_change()
  {
     setTimeout(function(){ 

     $.ajax({
       url:"update_count_change.php",
       success:function(data)
        {

        }
      });
    },9000);

 }
</script>
</html>
