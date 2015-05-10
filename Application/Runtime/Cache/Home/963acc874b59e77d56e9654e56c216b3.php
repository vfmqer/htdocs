<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/Public/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/Public/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/Public/assets/css/main-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function setTime() {
        var dt = new Date();
        var arr_week = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
        var strWeek = arr_week[dt.getDay()];
        var strYear = dt.getFullYear() + "年";
        var strMonth = (dt.getMonth() + 1) + "月";
        var strDay = dt.getDate() + "日";
        document.write(strYear + strMonth + strDay + " " + strWeek);
    }
</script>   
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
       <!-- <img src="Images/feige1.png" style="height:23px;float:left;margin:10px 5px 0 30px"> -->
       <div style="float:left;margin-left:50px">后台管理系统</div>
       <!-- <img src="Images/feige2.png" style="height:20px;margin:3px 0 0 3px"> -->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo ($username); ?></span><a href="/Public/chinapost/index.php?m=Public&a=logout" title="退出系统" class="dl-log-quit">[退出]</a>
    <div style=""><span class="STYLE1"><span class="STYLE2">■今天是:</span>
    <script> setTime();</script> </span></div>    
    </div>

  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>	      
        <!-- <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">业务管理</div></li>  -->      
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="/Public/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/Public/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/Public/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="/Public/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',homePage:'1',menu:[{text:'客户端管理',items:[{id:'1',text:'会员管理',href:"<?php echo U('ui/homepage');?>"},{id:'2',text:'引导页管理',href:"<?php echo U('ui/homepage');?>"},{id:'3',text:'抽奖管理',href:'Member/index.html'},{id:'4',text:'产品管理',href:'Member/index.html'},{id:'5',text:'资讯管理',href:'Member/index.html'},{id:'6',text:'问卷管理',href:'Member/index.html'},{id:'7',text:'留言管理',href:'Member/index.html'},{id:'8',text:'地址管理',href:'Member/index.html'},{id:'9',text:'返利订单管理',href:'Member/index.html'},{id:'10',text:'返利产品管理',href:'Member/index.html'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>