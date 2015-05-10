<?php
$api_opens="1";
$keys=$api_opens."123456789";
$times=$_GET['datetime'];
$newkey =md5($keys.$times);

?>
