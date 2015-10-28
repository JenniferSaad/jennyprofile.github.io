<?php

session_start();

//$_SESSION['username']="Jenny"; // as if putting this variable public in Java---NOT USING IT HERE
require('include/connect.php');

if(isset($_POST['firstlastname'] )&& $_POST['firstlastname']!=null)

{
	
	$users = $mysqli->real_escape_string($_POST['firstlastname']);
	
	
}else
{
	die("dont try to mess around bro"); //if hackers want to hack
}

if(isset($_POST['password'] )&& $_POST['password']!=null)

{
	
	$password = $mysqli->real_escape_string($_POST['password']);
	$password = md5($password);
	
}else
{
	die("dont try to mess around bro"); //if hackers want to hack
}
//die($firstlastname);

//in scripting use -> as if in java class.get...
$stmt = $mysqli->prepare("Insert INTO users(firstlastname,password) VALUES(?,?)");// prepare for me this parameter   #1
$stmt->bind_param("ss",$users,$password);//ss awal wahad string tene wahad string   #2
$stmt->execute();//bitttabe2 #1 with #2
$stmt->close();
header("location:index.html");





?>
