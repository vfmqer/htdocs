<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>资讯管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/js/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/js/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/js/Public/Css/style.css" />
    <script type="text/javascript" src="/js/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/js/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/js/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/js/Public/Js/common.js"></script>
 
    <style type="text/css">
        body { padding-bottom: 40px;}
        .sidebar-nav {padding: 9px 0;}

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {float: none;padding-left: 5px;padding-right: 5px;}
        }
    </style>

</head>
<body>
<form class="form-inline definewidth m20">    
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; 
<button type="button" class="btn btn-success" id="addnew">新增</button>
<!-- &nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增会员</button> -->
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>编号</th><th>资讯名称</th><th>资讯类型</th><th>资讯内容</th><th>操作</th>
    </tr>
    </thead>
	<tr>
        <td>1</td><td>新闻</td><td>行业信息</td><td>独家数据都平静扫破旧破静静地搜啊决斗盘</td>
        <td><a href="#">编辑</a><a href="#">删除</a></td>
    </tr>	
</table>
</body>
</html>