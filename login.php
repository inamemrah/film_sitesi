<?php 
 
include("db.php");



ob_start();
session_start();
 
$name = $_POST['name'];
$password = $_POST['password'];
 
$sql_check = mysql_query("select * from user where name='".$name."' and password='".$password."' ") or die(mysql_error());

    if(($user_table = mysql_fetch_array($sql_check)))
    {
        $_SESSION["login"] = "true";
        $_SESSION["name"] = $name;
        $_SESSION["user_id"] = $user_table['id'];
        header("Location: home.php");
    }
    else 
    {
        if($name=="" or $password=="") {
    	header("Location: home.php?k_s_bos");
           
        }
        else {
    	header("Location: home.php?k_s_yanlis");
           
        }
    }
 
ob_end_flush();
?>