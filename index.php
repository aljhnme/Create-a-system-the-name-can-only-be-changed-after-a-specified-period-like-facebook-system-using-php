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
      <input type="text" placeholder="first_name"  id="first_name" />
      <input type="text" placeholder="Last_name"  id="Last_name" />
      <button id="insert">Insert</button>
      <div id="text_smail">
      	
      </div>
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

           $.ajax({
               url:"insert_name.php",
               type:"post",
               data:{first_name:first_name,Last_name:Last_name},
               success:function(data)
               {
                 
                 if (data == "done_successfully") 
                 {
                   $("#text_smail").html('<h5 style="text-align: center;">Name inserted successfully</h5>');
                 }
                 if (data == "There_is_a_name") 
                 {
                   $("#text_smail").html('<h5 style="text-align: center;color:red;">The name cannot be entered because you have already entered a name previously. If you want to enter a new name, change it<a href="Changing_name.php">from here</a></h5>');
                 }
               }
           });
           }else{
              $("#text_smail").html('<h6 style="text-align: center;color:red;">Please enter the name</h6>');
           }
         });
    	});
</script>
</html>