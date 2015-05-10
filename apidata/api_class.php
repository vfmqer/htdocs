<?php
function getwifi()
{
   $cSql="select CNAME,CPASS,SID from  w_connect";
	return sqlsetjson($cSql);

}
//继续写方法

function sqlsetjson($strsql) //返回多条数据JOSN方法
{
	global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
	$link = mysql_connect("$mysql_server_name","$mysql_username","$mysql_password"); //
	mysql_select_db("$mysql_database"); 
	mysql_query("set names utf8");
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


function json_return($vle)//提示符
{
	$array = array("a" => $vle);
	return json_encode($array);	
}
function getWifiInfo(){
	$sql="select *from w_about";
	$return=sqlsetjson($sql);
	echo $return;
	}
	
function applyWifi($sname,$sphone,$wifiname,$wifipass,$sadd,$pid,$cid,$did,$address){
	$latlng=getlatandlng($address.$sadd);
	$lat=$latlng['lat'];
	$lng=$latlng['lng'];
	$shopsql="insert into w_shop(SNAME,SPHONE,ProvinceID,CityID,DistrictID,SADDRESS,SLATITUDE,SLONGITUDE)values
	('$sname','$sphone','$pid','$cid','$did','$sadd','$lat','$lng')";
	sqlquery($shopsql);
	
	$sidsql="select @@identity";
	$sidresult=sqlset($sidsql);
	$sid=$sidresult[0];
	
	$consql="insert into W_CONNECT (SID,CNAME,CPASS) values('$sid','$wifiname','$wifipass')";
	$conresult=sqlquery($consql);
	if($conresult > 0){
		$arr=array("a"=>"00001");
		echo json_encode($arr);
		}
		}	
function getshop($lat,$lng,$distance)
{
   $cSql="select 
			SID as Id,SNAME,SPHONE,PFILE as SPIC,SLATITUDE,SLONGITUDE,0.00 as DISTANCE
			from W_SHOP 
			left join W_PIC on W_SHOP.PID = W_PIC.PID 
		  where W_SHOP.ISDELETE = 0 AND ISEXAMINE = 1";
   global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
   $link = mysql_connect("$mysql_server_name","$mysql_username","$mysql_password"); 
   mysql_select_db("$mysql_database"); 
   mysql_query("set names 'UTF8'");
   $result = mysql_query($cSql, $link); 
   $strings = "";
   try{
	   while ($row = mysql_fetch_array($result))
	   {
		  $thisdis = getMiles($lat, $lng, $row['SLATITUDE'],$row['SLONGITUDE']);
		  if($thisdis < $distance)
		  {
			if($strings!="")
			{
				$strings.=",".json_encode($row);
			}
			else
			{
				$strings=json_encode($row);
				
			}
		  }
	   }
   }
   catch(Exception $e)
   {
	 $strings = "[{'a':'".$e."'}]";
   }	
   return "[".$strings."]";
}
function getMiles($latitude1, $longitude1, $latitude2, $longitude2) {
    $theta = $longitude1 - $longitude2;
    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;
    return round($kilometers,2);
}							
?>
