<?php


include("apidata/api_key.php");
include("/Config.php");

$ip = $_SERVER["REMOTE_ADDR"];
$time = date("Y-m-d H:i:s", time());
$from = '';
$myos=new ClientGetObj;
$from=$myos->getOS(); 

$myfile = 'apidata//api_log.txt';
$str = "ip='".$ip."' system='".$from."' time='".$time."' \r\n";
$file_pointer = fopen($myfile,"a");
fwrite($file_pointer,$str);
fclose($file_pointer);

class ClientGetObj{  
    function getOS(){  
        global $_SERVER;  
        $agent=$_SERVER["HTTP_USER_AGENT"];  
        $os=false;  
        if(preg_match("/win/",$agent)&&strpos($agent,"95")){  
            $os="Windows 95";  
        }else if(preg_match("/win 9x/",$agent)&&strpos($agent,"4.90")){  
            $os="Windows ME";  
        }else if(preg_match("/win/",$agent)&&preg_match('/98/',$agent)){  
            $os="Windows 98";  
        }else if(preg_match("/win/",$agent)&&preg_match('/nt 5.1/',$agent)){  
            $os="Windows XP";  
        }else if(preg_match("/win/",$agent)&&preg_match('/nt 5',$agent)){  
            $os="Windows 2000";  
        }else if(preg_match("/win/",$agent)&&preg_match('/nt/',$agent)){  
            $os="Windows NT";  
        }else if(preg_match("/win/",$agent)&&preg_match('/32/',$agent)){  
            $os="Windows 32";  
        }else if(preg_match("/linux/",$agent)){  
            $os="Linux";  
        }else if(preg_match("/unix/",$agent)){  
            $os="Unix";  
        }else if(preg_match("/sun/",$agent)&&preg_match("/os/",$agent)){  
            $os="SunOS";  
        }else if(preg_match("/ibm/",$agent)&&preg_match("/os/",$agent)){  
            $os="IBM OS/2";  
        }else if(preg_match("/mac/",$agent)&&preg_match("/pc/",$agent)){  
            $os="Macintosh";  
        }else if(preg_match("/powerpc/",$agent)){  
            $os="PowerPC";  
        }else if(preg_match("/aix/",$agent)){  
            $os="AIX";  
        }else if(preg_match("/HPUX/",$agent)){  
            $os="HPUX";  
        }else if(preg_match("/netbsd/",$agent)){  
            $os="NetBSD";  
        }else if(preg_match("/bsd/",$agent)){  
            $os="BSD";  
        }else if(preg_match("/OSF1/",$agent)){  
            $os="OSF1";  
        }else if(preg_match("/IRIX/",$agent)){  
            $os="IRIX";  
        }else if(preg_match("/FreeBSD/",$agent)){  
            $os="FreeBSD";  
        }else if(preg_match("/teleport/",$agent)){  
            $os="teleport";  
        }else if(preg_match("/flashget/",$agent)){
            $os="flashget";  
        }else if(preg_match("/http all-ei0.7:/",$agent)){
			$os="IE7";
		}else if(preg_match("/http all-ei0.8:/",$agent)){
			$os="IE8";
		}else if(preg_match("/http all-ei0.9:/",$agent)){
			$os="IE9";
		}else if(preg_match("/http all-ei1:/",$agent)){
			$os="IE10";
		}else if(preg_match("/http all.360-ei6:/",$agent)){
			$os="360浏览器";
		}else if(preg_match("/http all.Frie-ei:/",$agent)){
			$os="火狐浏览器";
		}else if(preg_match("/webzip/",$agent)){  
            $os="webzip";  
        }else if(preg_match("/offline/",$agent)){
            $os="offline";
		}else if(preg_match("/java/",$agent)){
			$os="Android";
		}
		else if(preg_match("/mac/",$agent)){  
            $os="Macintosh";
        }else{
            $os=$agent;  
        }
        return $os; 
	}  
}

// 防止用户恶意刷新服务器，造成数据拥堵
$myfile = 'apidata/api_log.txt';

$jiekey=$_GET['keys'];
$jietime=$_GET['datetime'];

$str = "接收='".$jiekey."' 新算='".$newkey."' time='".$jietime."' \r\n";
$file_pointer = fopen($myfile,"a");
fwrite($file_pointer,$str);
fclose($file_pointer);

function jsonstring1($strings) //多维JSON数组 加工处理
{
	$jsonStr1 = preg_replace('/[\'"](\[.*?\])[\'"]/iU', '$1', $strings);// 去除数组外的引号，
	$jsonStr1 = preg_replace('/;\s*\"/', '"', $jsonStr1);// 去除的逗号
	return $jsonStr1;
}

//echo $jiekey."</br>".$newkey."</br>";
if($jiekey==$newkey) //钥匙验证
{    
 

	if($_GET['id']==01) //用户注册
	{
      if(isset($_POST["username"]) && isset($_POST["password"])) //判断PSOT是否提交
      {
	    $username=$_POST['username'];
		$password=$_POST['password'];
        $regstr="select * from js_user where username='".$username."'";
    
        if(sqlquery($regstr,"username")==$username)
        {    
                echo json_return("01002");//重复注册
        }
        else
        {
           $regstr="insert into js_user(username,phone,password,level,vip,addtime,integral,type) value('".$username."','".$username."','".$password."',
            0,0,'".$time."',0,'用户')";

            if(sqlFunction($regstr)!=0)
            {
                echo json_return("01001");//注册成功
            }
            else
            {   
                //echo sqlFunction($regstr);
                echo json_return("01003");//注册失败
            } 
        }
        
      }
      else
      {
        echo json_return("11111");//没有获取到值
      }
	}

    elseif($_GET['id']=="02") //用户登录	  
    {
      if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])){
      
		$username=$_POST['username'];
		$password=md5($_POST['password']);
        
	 	$loadstr="select * from js_user where username='{$username}' AND password='{$password}'";
        
		if(sqlquery($loadstr,"username")==$username && sqlquery($loadstr,"password")==$password){
           
    			echo json_return("02001");//登陆成功
               
        
		}else{
			 echo json_return("02002");//登陆失败		
		}
      }else{
        echo json_return("02003");//没有获取到值
      }
	}
    
	elseif($_GET['id']=="03")  //修改密码
	{

       if(isset($_POST["username"]) && isset($_POST["password"])) //判断PSOT是否提交
      {       
		$username=$_POST['username'];
        $password=$_POST['password'];
        $regstr="select * from js_user where username='".$username."'";
        $updatestr="update js_user set password='".$password."' where username='".$username."'";

        if(sqlquery($regstr,"username")!=null)
        {
            if(sqlFunction($updatestr)!=0)
            {
                echo json_return("03001");//修改成功
            }
            else
            {   
                echo json_return("03002");//修改失败
            } 
        }
        else
        {
            echo json_return("03003"); //无此用户           
        }
      }
      else
      {
        echo json_return("11111");//没有获取到值
      }  
	}
    
    elseif($_GET['id']=="04")  //获取产品信息
    {
        if(isset($_POST["productid"]) && isset($_POST["category"])) //判断PSOT是否提交
      {  
        $productid=$_POST['productid'];
        $category=$_POST["category"];
        $getprostr="select * from js_product where id='".$productid."' and category='".$category."'";

        if(sqlquery($getprostr,"id")!=null)
        {   
            echo json_decode(array(sqlset($getprostr)));//返回数据
            echo json_return("04001");//查找成功
        }
        else
        {
            echo json_return("04002"); //查找失败           
        }
      }
      else
      {
        echo json_return("11111");//没有获取到值
      }         
    }
    
	elseif($_GET['id']=="05")  //根据订单获取产品信息
    {
        if(isset($_POST["orderid"])) //判断PSOT是否提交
      {
        $orderid=$_POST['orderid'];
        $getprostr="select * from js_order a inner join js_product b on a.productid=b.id where a.orderid='".$orderid."'";
        echo $getprostr;
        if(sqlquery($getprostr,"orderid")!=null)
        {
            echo array(sqlset($getprostr));//返回数据
            echo json_return("05001");//查找成功
        }
        else
        {
            echo json_return("05002"); //查找失败           
        }
      }
      else
      {
        echo json_return("11111");//没有获取到值
      }        
    }
    
    elseif($_GET['id']=="06")  //插入留言
    {
       if(isset($_POST["username"]) && isset($_POST["type"]) && isset($_POST["content"]) && isset($_POST["turename"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["address2"])) //判断PSOT是否提交
      {       
        $username=$_POST['username'];$type=$_POST['type'];
        $content=$_POST['content'];$turename=$_POST['turename'];
        $tel=$_POST['tel'];$email=$_POST['email'];
        $address=$_POST['address'];$address2=$_POST['address2'];
        $insertstr="insert into js_message(username,type,content,turename,tel,email,address,address2,sendtime,state) value('".$username."','".$type."','".$content."','".$turename."','".$tel."','".$email."','".$address."','".$address2."','".$time."','未回复')";

        if(sqlFunction($insertstr)!=0)//检查是否插入数据库
        {
            echo json_return("06001");//插入成功
        }
        else
        {
            echo json_return("06002"); //插入失败           
        }
      }
      else
      {
        echo json_return("11111");//没有获取到值
      }  
    }

    elseif($_GET['id']=="07")  //查询留言
    {
       if(isset($_POST["username"]) && isset($_POST["type"])) //判断PSOT是否提交
      {       
        $username=$_POST['username'];$type=$_POST['type'];
        $selectstr="select * from js_message where username='".$username."' and type='".$type."'";

        if(sqlquery($selectstr,"username")!=null)//检查是否存在数据
        {                           
            echo json_return("07001");//返回成功
            echo array(sqlset($selectstr));//返回留言
        }
        else
        {
            echo json_return("07002"); //无此留言           
        }
      }
      else
      {
          echo json_return("11111");//没有获取到值
      }  
    }

    elseif($_GET['id']=="08")  //查询地址
    {
       if(isset($_POST["map"])) //判断PSOT是否提交
      {       
        //$map=$_POST['map'];
        $selectstr="select * from js_address";

        if(sqlquery($selectstr,"id")!=null)//检查是否存在数据
        {                           
            echo json_return("08001");//返回成功
            foreach (sqlset($selectstr) as $value)
            {echo  "xy:".$value["xy"]."<br>";}
        }
        else
        {
            echo json_return("08002"); //无地址信息           
        }
      }
      else
      {
          echo json_return("11111");//没有获取到值
      }  
    }

    elseif($_GET['id']=="09")  //查询抽奖信息（未完成）
    {
       if(isset($_POST["map"])) //判断PSOT是否提交
      {       
        $selectstr="select * from js_address";

        if(sqlquery($selectstr,"id")!=null)//检查是否存在数据
        {                
            foreach (sqlset($selectstr) as $value)
            {echo  "xy:".$value["xy"]."<br>";}
            echo json_return("09001");//返回成功
        }
        else
        {
            echo json_return("09002"); //无抽奖信息           
        }
      }
      else
      {
          echo json_return("11111");//没有获取到值
      }  
    }

    elseif($_GET['id']=="10")  //查询中奖信息（未完成）
    {
       if(isset($_POST["map"])) //判断PSOT是否提交
      {       
        $selectstr="select * from js_address";

        if(sqlquery($selectstr,"id")!=null)//检查是否存在数据
        {                
            foreach (sqlset($selectstr) as $value)
            {echo  "xy:".$value["xy"]."<br>";}
            echo json_return("09001");//返回成功
        }
        else
        {
            echo json_return("09002"); //无中奖信息           
        }
      }
      else
      {
          echo json_return("11111");//没有获取到值
      }  
    }

    elseif($_GET['id']=="11")  //提交问卷结果
    {
       if(isset($_POST["username"]) && isset($_POST["number"]) && isset($_POST["qusnumber"]) && isset($_POST["result"])) //判断PSOT是否提交
      {       
        $username=$_POST["username"];$number=$_POST["number"];$qusnumber=$_POST["qusnumber"];$result=$_POST["result"];$type=$_POST["type"];
        $insertstr="insert into js_useranswer(username,type,number,qusnumber,result,time) value('".$username."','".$type."','".$number."','".$qusnumber."','".$result."','".$time."')";

        if(sqlFunction($insertstr)!=0) //检查是否插入成功
        {   echo json_return("11001");  } //提交成功
        else
        {   echo json_return("11002");  } //提交失败        
      }
      else
      {     echo json_return("11111");   }//没有获取到值       
    }

    elseif($_GET['id']=="12")  //获取问卷信息
    {
       if(isset($_POST["username"]) && isset($_POST["number"]) && isset($_POST["type"])) //判断PSOT是否提交
      {       
        $username=$_POST["username"];$number=$_POST["number"];$type=$_POST["type"];
        $selectstr="select * from js_useranswer where username='".$username."' and type='".$type."' and number='".$number."'";

        if(sqlquery($selectstr,"username")==null) //检查是否已做过问卷
        {   
            echo json_return("12001"); //未做过问卷 
            echo array(sqlset($selectstr));//返回问卷信息;
        } 

        else
        {   echo json_return("12002");  } //已做过问卷        
      }
      else
      {     echo json_return("11111");   }//没有获取到值       
    }

    elseif($_GET['id']=="13")  //获取资讯信息
    {
       if(isset($_POST["newsid"]) && isset($_POST["type"])) //判断PSOT是否提交
      {       
        $newsid=$_POST["newsid"];$type=$_POST["type"];
        $selectstr="select * from js_news where id='".$newsid."' and type='".$type."'";

        if(sqlquery($selectstr,"id")!=null) //检查是否存在数据
        {   
            echo json_return("13001"); //查询成功
            //foreach (sqlset($selectstr) as $value){}
            $value=sqlset($selectstr);
            echo json_encode($value);//返回资讯信息;
        } 

        else
        {   echo json_return("13002");  } //没有资讯        
      }
      else
      {     echo json_return("11111");   }//没有获取到值       
    }

    elseif($_GET['id']=="14")  //上传推荐人
    {
       if(isset($_POST["username"]) && isset($_POST["recommend"])) //判断PSOT是否提交
      {       
        $username=$_POST["username"];$recommend=$_POST["recommend"];
        $selectstr1="select id from js_user where username='".$recommend."'";
        $selectstr2="select recommend from js_user where username='".$username."'";
        $updatestr="update js_user set recommend='".$recommend."' where username='".$username."'";
        if(sqlquery($selectstr1,"id")!=null) //查询推荐人是否存在
        {
            if(sqlquery($selectstr2,"recommend")==null) //查询推荐人是否存在
            {          
                if(sqlFunction($updatestr)!=0) //检查是否存在数据
                {   echo json_return("14001");  } //上传成功 
                else
                {   echo json_return("14002");  } //上传失败   
            }
            else
            {
                echo json_return("14004"); //推荐人已存在
            }           
        }
        else
        {
            echo json_return("14003"); //推荐人不存在
        }      
      }
      else
      {     echo json_return("11111");  }//没有获取到值       
    }

    elseif($_GET['id']=="15")  //提交中奖结果（未完成）
    {
       if(isset($_POST["map"])) //判断PSOT是否提交
      {       
        $selectstr="select * from js_address";

        if(sqlquery($selectstr,"id")!=null)//检查是否存在数据
        {                
            echo json_return("15001");//返回成功
        }
        else
        {
            echo json_return("15002"); //无中奖信息           
        }
      }
      else
      {
          echo json_return("11111");//没有获取到值
      }  
    }

}
else
{
	echo json_return("00000");
}


function json_return($vle)//提示符
{
    $array = array("a" => $vle);
    return json_encode($array); 
}



?>



