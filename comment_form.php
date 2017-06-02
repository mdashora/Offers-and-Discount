<!-- This page is the comment form of web-site-->
<!-- php query to retrieve comments from database-->
<?php
    include 'includes/inc.php';
  ob_start();
  session_start();
  // if session is not set this will redirect to login page
    if(isset($_SESSION['user']) ) {
        // select loggedin users detail
  $userId=$_SESSION['user'];
    }
    if(isset($_GET['post']))
    {
	$post_id=$_GET['post'];
	$get_posts="SELECT * FROM offers WHERE offer_id='$post_id'";
	$run_posts=mysql_query($get_posts);
	$row=mysql_fetch_array($run_posts);
	$post_new_id=$row['offer_id'];
    }
      
    $select_comments="SELECT * FROM comment,users WHERE offer_id='$post_id' and userId=user_id ORDER BY comment_id DESC";
    $run_comments=mysql_query($select_comments);
    $comment_Count=mysql_num_rows($run_comments);
?>

<div style="clear: both;">
    <div >
	<h3 class="blog-post-meta " style="text-align: left;"><span class="badge"><?php echo $comment_Count;  ?></span> Comments</h3>
    </div><!--End of panel haeding-->
    <?php
    if($userId==""){
       ?>
                    Please <a href="login.php"  role="button" aria-haspopup="true" aria-expanded="false">
                      Login/Register<span ></span></a> to add comment.
                      
       <?php
    }
    ?>
    <div>


    <form method="POST" action="details.php?post=<?php echo $post_id;  ?>"class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-12">
            <textarea class="form-control"rows="5"name="comment_text" placeholder="Enter Comment"></textarea>
        </div><!--End of col-->
    </div><!--End of form group-->
            <?php
    if($userId!=""){
       ?>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="submit"name="comment"class="btn btn-success btn-block"value="Post Comment"/>
        </div><!--End of col-->
    </div><!--End of form group-->
			           <?php
    }
    ?>	
					
    </form>

    </div><!--End of panel body-->
</div><!--End of panel-->

<!-- php query to retrieve comments information from database-->
<?php       
	while($comment_rows=mysql_fetch_array($run_comments))
	{       
		$comment_name=$comment_rows['userName'];
		$comment_text=$comment_rows['comment'];
		$comment_date=$comment_rows['comment_date'];
		
                echo "
                <div>    
                <div class='row'>
                <div class='col-sm-2 text-center'>
                <h4 class='glyphicon glyphicon-user'></h4>
                </div>
                <div class='col-sm-10 comment-description' >
                <h4>$comment_name <small>$comment_date</small></h4>
                <p>$comment_text</p>
                <br>
                </div>
                </div>     
                </div>              
                ";         
	}

?>
<!-- php query to insert comments into the database-->
<?php
        //Selecting default time zone for demo purpose.
     date_default_timezone_set('America/New_York');
	if(isset($_POST['comment']))
	{                
		$comment_text=mysql_escape_string($_POST['comment_text']);
		$comment_date=date("l, jS F Y h:i a");
		$status="unapprove";		
		$insert_comment="INSERT INTO comment(comment, comment_date, offer_id,user_id)VALUES('$comment_text','$comment_date','$post_id','$userId')";
		if(mysql_query($insert_comment))
		{ 
			echo "<meta http-equiv='refresh' content='0'>";
            
		}
	}
?>

