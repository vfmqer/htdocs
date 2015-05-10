<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>订单返利管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Js/common.js"></script>
    <script type="text/javascript" src="/Public/Js/view.js"></script>
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
<form class="form-inline definewidth m20" action="?" method="get">
    地址关键字：
    <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary" onclick="addRow()">查询</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-success" onclick="addRow()" id="addnew">新增</button>
</form>

<body>
    <br/>
    <table id="table" class="table table-bordered table-hover definewidth m10" cellpadding="3">
        <thead>
            <tr>
                <td width="30px">编号</td>
                <td width="40%">问题</td>
                <td width="10%">A选项</td>
                <td width="10%">B选项</td>
                <td width="10%">C选项</td>
                <td width="10%">D选项</td>
                <td width="10%">操作</td>
                </tr>
        </thead>
    </table>
</body>
<script language="javascript" type="text/javascript">
function addRow() {
    //get rows
    var table = document.getElementById("table");
    var rows = table.rows.length;

    //添加一行
    var newTr = table.insertRow();
    //添加两列
    var newTd0 = newTr.insertCell();
    var newTd1 = newTr.insertCell();
    var newTd2 = newTr.insertCell();
    var newTd3 = newTr.insertCell();
    var newTd4 = newTr.insertCell();
    var newTd5 = newTr.insertCell();
    var newTd6 = newTr.insertCell();
    //设置列内容和属性
    newTd0.innerHTML = '<p>' + rows + '</p>';
    newTd1.innerHTML = '<input type="text" >';
    newTd2.innerHTML = '<input type="text" >';
    newTd3.innerHTML = '<input type="text" >';
    newTd4.innerHTML = '<input type="text" >';
    newTd5.innerHTML = '<input type="text" >';
    newTd6.innerHTML = '<a>删除</a>';
}
</script>

</html>