<?php
$baglanti = @mysql_connect('localhost', 'root', '');
$veritabani = @mysql_select_db('film');
  mysql_query("SET NAMES UTF8", $baglanti);
  
?>