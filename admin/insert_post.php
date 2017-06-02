<?php
    include "includes/inc.php";
?>

<!DOCTYPE HTML">
<html lang="eng">
<head>
  <title>Results</title>
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
<body>
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

	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			  <h3>Sort</h3>
			<div class="list-group">
				<a href="#" class="list-group-item">Sort one</a>
				<a href="#" class="list-group-item">Sort Two</a>
				<a href="#" class="list-group-item">Sort Three</a>
			</div>
			</div>
			
			<div class="col-sm-8 ">

			<h3>Search Results: </h3>


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