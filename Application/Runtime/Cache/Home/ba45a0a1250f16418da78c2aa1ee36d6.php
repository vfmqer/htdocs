<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>抽奖管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Js/common.js"></script>
 
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
        <th>编号</th><th>抽奖名称</th><th>抽奖具体说明</th><th>抽奖奖品</th><th>抽奖截止日期</th><th>操作</th>
    </tr>
    </thead>
	<tr>
        <td>1</td><td>五一抽奖</td><td>一等 1名，二等2名，三等3名</td><td>ipad</td><td>20150401</td>
        <td><a href="#">编辑</a><a href="#">删除</a></td>
    </tr>	
</table>
</body>
</html>