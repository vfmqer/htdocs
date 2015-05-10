<?php

	$mysql_server_name='127.0.0.1';
	$mysql_username='root';
	$mysql_password='123456';
	$mysql_database='js_mydata';
	$mysql_bk="set names utf8";
	
function sqlsetjson($strsql) //返回多条数据JOSN方法
{
	global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
	$link = mysql_connect("$mysql_server_name","$mysql_username","$mysql_password"); //
	mysql_select_db("$mysql_database"); 
	mysql_query("set names 'UTF8'");
	$result = mysql_query($strsql, $link); 
	$strings="";
	while ($row = mysql_fetch_array($result))
	{
		if($strings!="")
		{
		     $strings.=",".json_encode($row);
		}else
		 {
		 	$strings=json_encode($row);
		}
	}
	 return "[".$strings."]";
}


function sqlset($sql) //返回多条结果集合     需要用循环输出   实例： foreach (sqlset($regstr) as $value){echo  $value["username"];}
{
	global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;						
	$dsn = "mysql:host=".$mysql_server_name.";dbname=".$mysql_database;
    $db = new PDO($dsn,$mysql_username,$mysql_password);
    $db->query("set names utf8");
    $res=$db->query($sql);
    return  $res;
    $db = null;
}

function sqlquery($sql,$name) //SQL语句 和 需要返回的列名
{
	global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;						
	$dsn = "mysql:host=".$mysql_server_name.";dbname=".$mysql_database;
    $db = new PDO($dsn,$mysql_username,$mysql_password);
    $db->query("set names utf8");
    $res=$db->query($sql);
    foreach ($res as $value){
    	 return $value[$name];
    }
    $db = null;
}

function sqlFunction($sql)  //增删改   返回影响行数
{
	global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;						
	$dsn = "mysql:host=".$mysql_server_name.";dbname=".$mysql_database;
    $db = new PDO($dsn,$mysql_username,$mysql_password);
    $db->query("set names utf8");
    $count = $db->exec($sql);
    if($count!=0)
    {
    	return $count;
    }
    else
    {
    	return 0;
    }
    $db = null;
}

?>