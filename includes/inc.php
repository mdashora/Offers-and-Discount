<?php
error_reporting(0);
$connect=mysql_connect("localhost","root","")or die("Error occured in connecting to the database");
mysql_select_db("offers",$connect)or die("We did not select the database");
?>