	<?php
	
		include "includes/inc.php";
	?>
<!DOCTYPE HTML">
<html lang="eng">
<head>
<title>Offer & Discount Details</title>
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
<body style="margin-top: 50px;">
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
		<br>
		<br>
		<div class="row">
			<div class="col-sm-2">
				<?php
					include'sidebar.php';
				?>
			</div><!--End of col-->
			<div class="col-sm-9">

				<!--Content area starts here-->
				<?php
					if(isset($_GET['post']))
					{
					$post_id=$_GET['post'];
					$select_posts="SELECT * FROM offer, users WHERE offer_id='$post_id'";
					$post_query=mysql_query($select_posts);
					while($query_row=mysql_fetch_array($post_query))
					{
						$offer_id=$query_row['offer_id'];
						$post_title=$query_row['title'];
						$post_date=$query_row['post_date'];
						$start_date=$query_row['start_date'];
						$end_date=$query_row['end_date'];
						$post_author=$query_row['userName'];
						$post_address=$query_row['address'];
						$post_link=$query_row['link'];
						$post_rating=$query_row['rating_avg'];
						$post_image=$query_row['picture_name'];
						$post_content=$query_row['description'];
						$image_path="images/";
						
						// echo "
						// <h1 style='text-align:center;'>$post_title</h1>
						// <p><span>Posted by </span><span style='font-weight:bold;font-style:italic;'>$post_author</span>on &nbsp;$post_date</p><br>
						// <div class='img-thumbnail pull-left' style='margin-right:10px;'><img src='images/$post_image'width='450'height='400'></div>
						// <p style='font-family: lucida calligraphy;'><h3>$post_content<h3></p>
						// ";
					}
					
				}
				?>
				<div class="jumbotron" style='padding-top: 30px; padding-right: 10px; padding-bottom: 20px; padding-left: 15px;'>
					<div class="container-fluid">
						<div class="row">
						<p style='text-align:center; font-size:37px; font-family: "Georgia", Georgia, Serif;'> 
							<?php echo $post_title; ?> 
						</p>
						<p style='font-size:130%;'>
							Posted by 
							<span style='font-weight:bold;font-style:italic;'>
								<?php echo $post_author; ?>
							</span>
							On <?php echo $post_date; ?>
							
						</p>





						
						<div class='img-thumbnail pull-left' style='margin-right:15px;'>
							<img src="<?php echo $image_path.$post_image ?>" width='450' height='350'>
						</div>
						
						<div>
							<div>
								<p style='font-family: "New Century Schoolbook", serif; position: relative;'>
									<?php echo $post_content; ?>
								</p>
							</div>

													<p>
							<div>
							<p>
								<h5 style="text-align:left;">
								<span style="float:left">Rating: <?php echo $post_rating; ?> on 5</span>
								</h5><br>
							<span>
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
                			</span>
                			</p>	
                			</div>
						</p>

							
								<span>Location: </span><span style='font-weight:bold;'>
									<?php echo $post_address; ?>
								</span>
								<form action="http://maps.google.com/maps" method="get" target="_blank">
									<input type="hidden" name="saddr" value="my current location"/>
									<input type="hidden" name="daddr" value="<?php echo $post_address; ?>" />
									<input type="submit" value="Get directions" />	
								</form>
								<h3><a href="<?php echo $post_link; ?>" target="_blank">Click here for link to the offer!</a></h3><br>
								<span style='font-weight:bold;'>Offer is valid till
								</span> 
								<?php echo $end_date; ?>
						</div>
						</div>
					</div>
				</div>
				<div id="comments">
					<?php include 'comment_form.php'; ?>
				
				</div>
				
				

				<!--End of content area-->
			</div><!--End of col-->
			<div class="col-sm-1">
			</div>

		</div>
			<!--End of row-->
			<?php
			include 'footer.php';
			?>
	</div><!--End of contaier-->
	
</body>
</html>