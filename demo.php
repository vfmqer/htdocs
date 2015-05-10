<?php 

header("Access-Control-Allow-Origin：http://127.0.0.1");


$result=json_encode(array('status'=>"success",'message'=>"登陆成功!"));  
//echo $_GET['callback'].'("Hello,World!")';  
//echo $_GET['callback']."($result)";  
//动态执行回调函数  
$callback=$_GET['callback'];  
echo $callback."($result)";  


