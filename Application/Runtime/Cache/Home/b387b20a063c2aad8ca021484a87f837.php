<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>问卷管理</title>
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
    body {
        padding-bottom: 40px;
    }
    
    .sidebar-nav {
        padding: 9px 0;
    }
    
    @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        
        .navbar-text.pull-right {
            float: none;
            padding-left: 5px;
            padding-right: 5px;
        }
    }
    </style>
</head>

<body>
    <form class="form-inline definewidth m20">
        用户名称：
        <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" id="addnew">新增</button>
        <!-- &nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增会员</button> -->
    </form>
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>编号</th>
                <th>问卷类型</th>
                <th>问题</th>
                <th>邮箱</th>
                <th>地址</th>
                <th>详细地址</th>
                <th>留言内容</th>
                <th>留言用户</th>
                <th>操作</th>
            </tr>
        </thead>
        <tr>
            <td>1</td>
            <td>会员1</td>
            <td>15333446423</td>
            <td>382938293</td>
            <td>普通</td>
            <td>普通</td>
            <td>100</td>
            <td>2</td>
            <td>
                <a href="#">编辑</a>
                <a href="#">删除</a>
            </td>
        </tr>
    </table>
</body>

</html>