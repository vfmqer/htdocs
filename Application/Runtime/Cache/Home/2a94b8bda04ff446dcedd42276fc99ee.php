<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>

<head>
    <title><?php echo ($_SESSION['user']['username']); ?>，欢迎登录依森后台管理！</title>
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
        <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo ($_SESSION['user']['username']); ?></span><a href="<?php echo U('index/logout');?>" title="退出系统" class="dl-log-quit">[退出]</a>
            <div style=""><span class="STYLE1"><span class="STYLE2">■今天是:</span>
                <script>
                setTime();
                </script>
                </span>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="dl-main-nav">
            <div class="dl-inform">
                <div class="dl-inform-title">
                    <s class="dl-inform-icon dl-up"></s>
                </div>
            </div>
            <ul id="J_Nav" class="nav-list ks-clear">
                <li class="nav-item dl-selected">
                    <div class="nav-item-inner nav-home">系统管理</div>
                </li>
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
    BUI.use('common/main', function() {
        var config = [{
            id: '1',
            homePage: '0',
            menu: [{
                text: '客户端管理',
                items: [{
                    id: '0',
                    text: '首页',
                    href: "<?php echo U('index/welcome');?>"
                }, {
                    id: '1',
                    text: '管理员管理',
                    href: "<?php echo U('index/admin');?>"
                }, {
                    id: '2',
                    text: '会员管理',
                    href: "<?php echo U('index/userdisplay');?>"
                }, {
                    id: '3',
                    text: '引导页管理',
                    href: "<?php echo U('index/userguid');?>"
                }, {
                    id: '4',
                    text: '抽奖管理',
                    href: "<?php echo U('index/lottory');?>"
                }, {
                    id: '5',
                    text: '返利产品管理',
                    href: "<?php echo U('index/productRebate');?>"
                }, {
                    id: '6',
                    text: '展示产品管理',
                    href: "<?php echo U('index/product');?>"
                }, {
                    id: '15',
                    text: '产品类型管理',
                    href: "<?php echo U('index/producttype');?>"
                }, {
                    id: '7',
                    text: '资讯管理',
                    href: "<?php echo U('index/news');?>"
                }, {
                    id: '8',
                    text: '问卷管理',
                    href: "<?php echo U('index/lessons');?>"
                }, {
                    id: '9',
                    text: '留言管理',
                    href: "<?php echo U('index/message');?>"
                }, {
                    id: '10',
                    text: '地址管理',
                    href: "<?php echo U('index/address');?>"
                }, {
                    id: '11',
                    text: '订单管理',
                    href: "<?php echo U('index/order');?>"
                }, {
                    id: '12',
                    text: '返利管理',
                    href: "<?php echo U('index/rebate');?>"
                },{
                    id: '13',
                    text: '条码管理',
                    href: "<?php echo U('index/barcode');?>"
                }, {
                    id: '14',
                    text: '系统信息维护',
                    href: "<?php echo U('index/aboutus');?>"
                },]
            }]
        }];
        new PageUtil.MainPage({
            modulesConfig: config
        });
    });
    </script>
    <br />
    <br />
    <div style="text-align: center;margin-top:-60px;width: 100%;
    height: 89px;
    overflow: hidden;
    margin-bottom: 0px;">
        <div style="margin-left:150px;">
            <a>版权所有Copyright(C)2014-2015XXX净水有限公司</a>
            <br />
            <a href="http://www.essnn.com">技术支持：依森网络</a>
        </div>
    </div>
    </div>

</html>
</body>

</html>