<?php
    include "includes/inc.php";
session_start();

$_SESSION['pageurl'] = "Hello";
?>

<!DOCTYPE HTML">
<html lang="eng">
<head>
  <title>Results - Offer & Discount</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="text/css"rel="stylesheet"href="css/styles.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <style>
            /****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }

            .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #ddd; 
                float: right; 
            }

            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     


            /* Downloaded from http://devzone.co.in/ */
        </style>
</head>
<body style="margin-top: 70px;">
	<?php
	
		include 'header.php';
	?>
        <style>
			.list {cursor:pointer; list-style-type: none; display: inline-block; color: #F0F0F0; text-shadow: 0 0 1px #666666; font-size:1.4em;}
			p {text-align: justify;}
			.content {line-height:1.8em;}
			.post {border-bottom: #f0f0f0 1px solid; padding: 15px 5px;}
            .highlight, .selected {color:#F4B30A; text-shadow: 0 0 1px #F48F0A;}
        </style>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
			<br>
			<br>
			
				<?php
	
					include 'sidebar.php';
				?>
				<?php
	
					include 'sort.php';
				?>				
			</div>
			
			<div class="col-sm-9 ">

			<h3>Search Results: </h3>

			<!--Content area starts here-->			
		   <?php
           if(isset($_GET['submit']))
           {
           	    $search_query=$_GET['search'];
           	    $search_query2=$_GET['search2'];
		   	 	$select_offer="SELECT * FROM offer,users where (description like '%$search_query%' or title like '%$search_query%')  and address like '%$search_query2%' and userId=user_id";
				 	$offer_query=mysql_query($select_offer);
				 	while($query_row=mysql_fetch_array($offer_query))
				 	{
						$offer_id=$query_row['offer_id'];
						$offer_title=$query_row['title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['userName'];
						$post_rating=$query_row['rating_avg'];
						$offer_image=$query_row['picture_name'];
						$offer_content=substr($query_row['description'],0,300);
						?>

						<div class="row list-group-item">						
							<div class="img-thumbnail pull-left"style="margin-right:10px;"><img src="images/<?php echo $offer_image; ?>"width="250"height="150">						
							</div>
							<div>
							<p><h3 style="text-align:left;"><a href="details.php?post=<?php echo $offer_id; ?>" style="text-decoration:none" ><?php echo $offer_title; ?></a>
							</h3></p>
							<div>
							<p><h5 style="text-align:left;"><span>Rating: <?php echo $post_rating; ?>/5</span>
							<ul data-id = "<?php echo $offer_id; ?>" data-rating ="<?php echo $post_rating; ?>">
                			<?php 
                			for($i=1; $i<=5; $i++) 
                				{
                    			$selected = "";
                    			if(!empty($post_rating) && $i<=$post_rating) 
                    			{
                        		$selected = "selected";
                    			}
                			?>
                    		<li class="<?php echo $selected; ?> list">&#9733;</li>  
                			<?php 
                			}  
                			?>
                			</ul>
                			</p>	
                			</div>
							<p><h5 style="text-align:left;"><span>Posted By: </span><span"><?php echo $post_author; ?></span> <br> On &nbsp;<?php echo $post_date; ?></h5><p>
							</div>						
						</div>
						
						<?php
						
					}
					}
					else if(isset($_GET['cat']))
					 {
                   	$cat_id=$_GET['cat'];
				 	$select_posts="SELECT * FROM offer,users WHERE category='$cat_id' and userId=user_id";
				 	if($cat_id=="AllCategories"){
                   		$select_posts="SELECT * FROM offer,users where userId=user_id ";
                   	}  
				 	$post_query=mysql_query($select_posts);
					if (!$post_query) { // add this check.
						die('Invalid query: ' . mysql_error());
					}
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$offer_id=$query_row['offer_id'];
						$offer_title=$query_row['title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['userName'];
						$post_rating=$query_row['rating_avg'];
						$offer_image=$query_row['picture_name'];
						$offer_content=substr($query_row['description'],0,300);
						?>
				
						
						
						<div class="row list-group-item">						
							<div class="img-thumbnail pull-left"style="margin-right:10px;"><img src="images/<?php echo $offer_image; ?>"width="250"height="150">						
							</div>
							<div>
							<p><h3 style="text-align:left; text-decoration:none;"><a href="details.php?post=<?php echo $offer_id; ?>"><?php echo $offer_title; ?></a>
							</h3></p>
							<div>
							<p><h5 style="text-align:left;"><span>Rating: <?php echo $post_rating; ?>/5</span>
							<ul data-id = "<?php echo $offer_id; ?>" data-rating ="<?php echo $post_rating; ?>">
                			<?php 
                			for($i=1; $i<=5; $i++) 
                				{
                    			$selected = "";
                    			if(!empty($post_rating) && $i<=$post_rating) 
                    			{
                        		$selected = "selected";
                    			}
                			?>
                    		<li class="<?php echo $selected; ?> list">&#9733;</li>  
                			<?php 
                			}  
                			?>
                			</ul>
                			</p>	
                			</div>
							<p><h5 style="text-align:left;"><span>Posted By: </span><span"><?php echo $post_author; ?></span> <br> On &nbsp;<?php echo $post_date; ?></h5><p>
							</div>						
						</div>
						
						<?php
						
					}
					}
					else if(isset($_GET['sort']))
					{
                   	$sort_id=$_GET['sort'];
                   	if($sort_id=="EndingSoon"){
                   		$select_posts="SELECT * FROM offer,users where userId=user_id ORDER BY end_date DESC ";
                   	}
                   	if($sort_id=="RecentlyPosted"){
                   		$select_posts="SELECT * FROM offer,users where userId=user_id ORDER BY post_date DESC";
                   	}
                   	if($sort_id=="TopRated"){
                   		$select_posts="SELECT * FROM offer,users where userId=user_id ORDER BY rating_avg DESC";
                   	}         
                     	          					 	
				 	$post_query=mysql_query($select_posts);
					if (!$post_query) { // add this check.
						die('Invalid query: ' . mysql_error());
					}
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$offer_id=$query_row['offer_id'];
						$offer_title=$query_row['title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['userName'];
						$post_rating=$query_row['rating_avg'];
						$offer_image=$query_row['picture_name'];
						$offer_content=substr($query_row['description'],0,300);
						?>
				
						
						
						<div class="row list-group-item">						
							<div class="img-thumbnail pull-left"style="margin-right:10px;"><img src="images/<?php echo $offer_image; ?>"width="250"height="150">						
							</div>
							<div>
							<p><h3 style="text-align:left; text-decoration:none;"><a href="details.php?post=<?php echo $offer_id; ?>"><?php echo $offer_title; ?></a>
							</h3></p>
							<div>
							<p><h5 style="text-align:left;"><span>Rating: <?php echo $post_rating; ?>/5</span>
							<ul data-id = "<?php echo $offer_id; ?>" data-rating ="<?php echo $post_rating; ?>">
                			<?php 
                			for($i=1; $i<=5; $i++) 
                				{
                    			$selected = "";
                    			if(!empty($post_rating) && $i<=$post_rating) 
                    			{
                        		$selected = "selected";
                    			}
                			?>
                    		<li class="<?php echo $selected; ?> list">&#9733;</li>  
                			<?php 
                			}  
                			?>
                			</ul>
                			</p>	
                			</div>
							<p><h5 style="text-align:left;"><span>Posted By: </span><span"><?php echo $post_author; ?></span> <br> On &nbsp;<?php echo $post_date; ?></h5><p>
							</div>						
						</div>
						
						<?php
						
					}
					}					
				
				?>
				<!--End of content area-->
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