<?php
    include "includes/inc.php";
?>
<?php
  ob_start();
  session_start();
  // if session is not set this will redirect to login page
    if(isset($_SESSION['user']) ) {
        // select loggedin users detail
  $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow=mysql_fetch_array($res);
    }

?>
<nav class="navbar navbar-default navbar-fixed-top">


  <div class="container-fluid" style="padding-top:10px; padding-bottom: 14px;" >

  
    <div class="navbar-header" >

      <a class="navbar-brand" href="index.php">Offers And Discounts</a>
    </div>
   



      <ul class="nav navbar-nav "  style="width: 1000px;">


      <div  id="login" > 



            <div class="form-group" id="search" style="margin-top:10px;">

              <form method="GET" action="results.php" enctype="multipart/form-data">
            <div class="col-xs-10 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-2 col-md-offset-0" style="width: 300px;">
              <input type="text" placeholder=" Search keyword" value="" name="search" id="search" class="form-control">
            </div>
            <div class="col-xs-10 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-2 col-md-offset-0" style="width: 300px;">
              <input type="text" placeholder="Search Location" value="" name="search2" id="search2" class="form-control">            
             </div>
            <div class="button-group col-xs-10 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-0" >
                <input type="submit" name="submit" class="btn btn-success" value="Search"/>
                &nbsp &nbsp &nbsp
                        <?php
    if(isset($_SESSION['user']) ) {

?>
                 <a href="./insert_post.php" class="btn btn-primary">Add Offer</a>
<?php
}
?>
            </div> 
            </form>
</div>
</div>





        <?php
    if(isset($_SESSION['user']) ) {

?>                        
                    


                    <li class="dropdown">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false">
                      <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span>
                    </button>
                       <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                     </li>
                    <?php
                    }
                      else if(!isset($_SESSION['user']) ) {
                    ?>
                    <li>
                    <a  class="btn btn-default " href="login.php"  role="button" aria-haspopup="true" aria-expanded="false">
                      <span class="glyphicon glyphicon-user"></span>&nbsp;Login/Register&nbsp;<span ></span></a>

                    </li>




                  <?php
                  }

                  ?>

              
          

      </ul>
    </div>

 
</nav>