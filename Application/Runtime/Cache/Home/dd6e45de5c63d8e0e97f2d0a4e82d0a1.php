<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>首页</title>
    <meta charset="UTF-8">
    <style>
    #dark {
        background-color: #333;
        border: 1px solid #000;
        padding: 10px;
        margin-top: 20px;
    }
    
    #light {
        background-color: #FFF;
        border: 0px solid #dedede;
        padding: 10px;
        margin-top: 20px;
    }
    
    li {
        list-style: none;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    
    .button,
    .button:visited {
        background: #222 url(overlay.png) repeat-x;
        display: inline-block;
        padding: 5px 10px 6px;
        color: #fff;
        text-decoration: none;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
        text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        position: relative;
        cursor: pointer
    }
    
    .button:hover {
        background-color: #111;
        color: #fff;
    }
    
    .button:active {
        top: 1px;
    }
    
    .small.button,
    .small.button:visited {
        font-size: 11px
    }
    
    .button,
    .button:visited,
    .medium.button,
    .medium.button:visited {
        font-size: 13px;
        font-weight: bold;
        line-height: 1;
        text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
    }
    
    .large.button,
    .large.button:visited {
        font-size: 14px;
        padding: 8px 14px 9px;
    }
    
    .super.button,
    .super.button:visited {
        font-size: 34px;
        padding: 8px 14px 9px;
    }
    
    .pink.button,
    .magenta.button:visited {
        background-color: #e22092;
    }
    
    .pink.button:hover {
        background-color: #c81e82;
    }
    </style>
</head>

<body>
    <div id="light" style="text-align: center;">
        <ul>
            <li><a class="super button pink" onclick="test()">每月28号赠送抽奖次数</a></li>
        </ul>
    </div>
    <div styel="width:100%;height:800px" align="center"><img src="/htdocs/Public/Images/welcome.png" height="100" style="margin-top:250px" /></div>
</body>

</html>

<script type="text/javascript">
	function test () {
		var date=new Date();
		var day = date.getDate()
		if(day==28){
            var herf = "<?php echo U('index/getprize');?>?id="+day;
            if(confirm("今天是"+date.getFullYear()+"年"+date.getMonth()+"月"+date.getDate()+"日，确定增加抽奖次数吗？")){
			window.location.href = herf;
            }
		}else{
			var count = 28-date.getDate();
			alert("当前时间为:"+date.getFullYear()+"年"+date.getMonth()+"月"+date.getDate()+"日。"+"每月28号才能赠送，还剩"+count+"天才能赠送");
		}
	}
</script>