<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信商城后台管理系统</title>
<style type="text/css">
<!--
*{margin:0px; padding:0px;}
body{background: url(/Public/Images/bg.jpg) repeat-x top center; background-color:#084e8d;}
.login_box{margin:0 auto; width:1024px; height:725px; background:url(/Public/Images/login_bg.png) no-repeat;}
.login_text{font-size:13px; color:#075398; width:270px; padding:320px 0px 0px 470px; line-height:22px;}
.login_text P{height:38px;vertical-align:middle;}
.login_submit{padding-left:50px;}
.text_bg{background:url(/Public/Images/input_bg.jpg) no-repeat; width:182px; height:27px; border:none; margin-bottom:-4px;}
.code_bg{width:90px; border-right:1px solid #88b0dc;}
-->
</style>
<script language="javascript"> 
	function fsubmit(obj){ 
	obj.submit(); 
	} 
	function freset(obj){ 
	obj.reset(); 
	} 
</script> 
<!--[if lte IE 6]>
<script src="/Public/js/ie6_png.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div,img');
    </script>
<![endif]--> 
</head>
<body>
    <div class="login_box">
    	<div class="login_text">
        <form name="myform" method="post" action="/index.php/home/ui/validateAdmin">

        	<P>用户名：<input class="text_bg" type="text" name="username"></P>
            <P style="word-spacing:6px;">密 码：<input class="text_bg" type="password" name="password"></P>

            <!--<P>验证码：<input type="text" class="text_bg code_bg" name="code"> 
           		<img src="/Office/index.php/login/verify.html" onclick='this.src=this.src+"?"+Math.random()' style="margin-bottom:-5px;">
        	</P>-->

            <P class="login_submit">
	            <input type="image" onClick="javascript:fsubmit(document.myform);return false;"src="/Public/Images/submit_btn.jpg"> 
	            <input type="image" onClick="javascript:freset(document.myform);return false;"src="/Public/Images/reset_btn.jpg"> 
            </P>

        </form>    
        </div>
    </div>
</body>
</html>