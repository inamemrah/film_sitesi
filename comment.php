<?php
include("db.php");
session_start();
?>
<?php

$comment = $_POST['comment'];
$film_id = $_POST['film_id'];
if(isset($_POST['comment_id'])){
	$comment_id = $_POST['comment_id'];
}
else
$comment_id=0;


  	$baglanti=@mysqli_connect("localhost","root","","film");
  	
	if(isset($_SESSION["login"])){
		$sql="INSERT INTO comment (user_id,film_id,comment,comment_id) VALUES (".$_SESSION["user_id"].",".$film_id.",'".$comment."','".$comment_id."')";
		$addComment = mysqli_query($baglanti,$sql);
	}

if($addComment){
header("Location: home.php?y_eklendi&id=".$film_id);
}else{
echo "Mesaj eklenemedi";
}
?>