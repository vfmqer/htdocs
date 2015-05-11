<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, height = device-height, initial-scale=1, target-densitydpi=medium-dpi">
<title>登录</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.1.min.js"></script>

</head>

<body>

<!--头部-->
<div class="headbg" align="center">
  <div class="headback" style="">
  <a href="index.html"><img src="img/img002.png" height="30"></a></div>
  <div class="headload" style="">登录</div>
   
</div>

<!--主体-->
<?php
header("Content-Type:text/html;charset=utf8");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
$keys="1123456789";
$timeul=time();
$timewin=date('Y-m-d-H-i', $timeul);
$timemd5=md5($keys.$timewin);


$url ="http://192.168.1.104/api.php?keys=".$timemd5."&datetime=".$timewin."&id=02";

?>
<form action=<?php echo $url;?> method="post" id="loginform" >
  <div class="" style="margin:40px 5% 0 5%">
    <img src="img/img003.png" height="20" width="15" class="mbimg" />
    <input type="text" placeholder="请输入手机号" class="mbinput" name="username"></input>
    <div class="hline" style=""></div>
  </div>

  <div class="" style="margin:20px 5% 0 5%">
    <img src="img/img004.png" height="20" width="15" class="mbimg" />
    <input type="text" placeholder="请输入密码" class="mbinput" name="password"></input>
    <div class="hline" style=""></div>
  </div>
  
  <div class="" style="margin:30px 5% 0 5%">
    <a href="#">
    <button class="btload" action="load();">登录</button>
    </a>
  </div>
  
  <div class="btbg" align="center" style="">
    <div style="width:177px">
    <a href="wjmm.html" class="wjmm" style="">忘记密码？</a>
    <div class="sline" style=""></div>
    <a href="regist.html" class="zcxyy" style="">注册新用户</a>
    </div>
  </div> 
 
</form>

<!--尾部-->
<script>
$("#loginform").submit(function(){
  $.ajax({
    url: "<?php echo $url;?>",
    type: 'POST',
    dataType: 'json',
    data:$('#loginform').serialize(),// 要提交的表单 
  })
  .done(function(ret) {
    if(ret.a=="02001"){
      window.location.href="http://www.baidu.com";
    }else if(ret.a=="02002"){
      alert('登陆失败，用户密码错误！');
    }else if(ret.a=="02003"){
      alert('用户名、密码不能为空！');
    }else{
      alert('登陆失败，用户密码错误！');
      
    }


  });
  return false;
});
</script>

</body>
</html>

