<?php
	//Database Information
	$hostname="1ad987f704ab:3306";
	$username="root";
	$password="weouthere1";
	$dbname="sourcelair";

	//Connect to Database
	mysql_connect("$hostname","$username", "$password") or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please email contact@wulf.design'),history.go(-1)</script></html>");
	mysql_select_db("$dbname");

	//Begin session for the user
	session_start();

	//Get the values from the Create Game form using POST method
	$the_name=$_POST['campaign_name'];
	$the_userRole=$_POST['user_role'];

	//Perform SQL command
	$select = "insert into games (userName, userType, gameName) values 
    ('".$_SESSION["USERNAME"]."', '".$the_userRole."', '".$the_name."')";
	$sql=mysql_query($select);

	//Close the connection
	mysql_close();

	//Direct them back to the same page (refresh page)
	header('Location: /my-games/select.php');
?>