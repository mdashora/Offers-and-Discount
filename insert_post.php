<?php
include "includes/inc.php";

  ob_start();
  session_start();
  // if session is not set this will redirect to login page
    if(isset($_SESSION['user']) ) {
        // select loggedin users detail
  $userId=$_SESSION['user'];
    }


if(isset($_POST['insert_post']))
{   

    $post_cat=$_POST['cat'];    
    $post_title=$_POST['post_title'];
    $post_content=mysql_escape_string($_POST['post_content']);
    $post_link=$_POST['post_link'];
    $post_location=$_POST['post_location'];
    $post_enddate=$_POST['post_endDate'];
    $post_image=$_FILES['post_image']['name'];
    $post_image_tmp=$_FILES['post_image']['tmp_name'];

    if (empty($post_cat) || empty($post_title)) {
        echo "<div class='alert alert-danger' style='text-align: center;'>Plese enter Offer 'Category' and 'Title' before submitting.</div>";
    }
    else{
    move_uploaded_file($post_image_tmp,"images/$post_image");
    $insert_post="INSERT INTO offer(category,address,title,rating_avg,description,link,picture_name,end_date,user_id) VALUES('$post_cat','$post_location','$post_title',0,'$post_content','$post_link','$post_image','$post_enddate','$userId')";
    $result=mysql_query($insert_post);
        
    if($result)
    {
       echo "<div class='alert alert-success' style='text-align: center;' >Thank You! New offer has been posted.</div>";
    }
    else
    {
         echo "<div class='alert alert-danger' style='text-align: center;'>Sorry there was an error in posting the offer. Please try again later</div>";
    }
    }
    
}
?>

<!DOCTYPE HTML">
<html lang="eng">
<head>
  <title>Add Offer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css"rel="stylesheet"href="css/styles.css"/>
  <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="margin-top: 70px;">
<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

</style>
       <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="post_endDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
	<?php
	
		include 'header.php';
	?>

	<div class="container">
		<div class="row">
			<div class="col-sm-2">
            <br>
            <br>
                <?php
    
                    include 'sidebar.php';
                ?>
			</div>
			
			<div class="col-sm-9 ">
            <?php
if ($_SESSION['pageurl']=="Hello") echo 'Session variable was set!';
else echo 'It was not!';
?>
			<h3 style="text-align: center;">Add New Offer </h3>
            <div class="panel-body">
                <form method="POST"action="insert_post.php?insert_post"enctype="multipart/form-data"class="form-horizontal">                                
                    <div  class="form-group">
                        <label for="cat_id" class="control-label col-sm-2">Category *</label>
                        <div class="col-sm-9">
                            <select name="cat"class="form-control">
                                <option>Select Category</option>
                                <option value="Food">Food</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Travel">Travel</option>
                                <option value="Others">Others</option>
                            </select>                                                 
                        </div>
                    </div><!--End of form group-->       
                    <div class="form-group">
                        <label for="post_title" class="control-label col-sm-2 ">Title *</label>
                        <div class="col-sm-9">
                            <input type="text"name="post_title"class="form-control">
                        </div>
                    </div><!--End of form group-->     
                    <h5 style="text-align: center;">You can follow up with more details...</h5>                    
                    <div class="form-group">
                        <label for="post_content" class="control-label col-sm-2">Description</label>
                        <div class="col-sm-9">
                        <textarea name="post_content"class="form-control" cols="30" rows="8"></textarea>
                        </div>
                    </div><!--End of form group-->                                        
                    <div class="form-group">
                        <label for="post_link" class="control-label col-sm-2">Link</label>
                        <div class="col-sm-9">
                            <input type="text"name="post_link"class="form-control">
                        </div>
                    </div><!--End of form group-->
                     <div class="form-group">
                        <label for="post_location" class="control-label col-sm-2">Location</label>
                        <div class="col-sm-9">
                            <input type="text"name="post_location"class="form-control">
                        </div>
                    </div><!--End of form group-->                   
                    <div class="form-group">
                        <label for="post_endDate" class="control-label col-sm-2">End Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="enddate" name="post_endDate" placeholder="YYYY/MM/DD" type="text"/>
                        </div>                      
                    </div>                
                    <div class="form-group">
                        <label for="post_image" class="control-label col-sm-2">Image</label>
                        <div class="col-sm-9">
                            <input type="file"name="post_image"class="form-control">
                        </div>
                    </div><!--End of form group-->                  
                    <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="insert_post" class="btn-success form-control" value="Add New Offer Now" style="font-size: 20px; text-align: center;"/>    
                    </div>       
                     </div>          
                </form>       

            </div>




			</div><!--End of col-->
			<div class="col-sm-1">
			
			</div><!--End of col-->
		</div><!--End of row-->
	</div><!--End of contaier-->
		<?php
			include 'footer.php';
		?>
</body>
</html>