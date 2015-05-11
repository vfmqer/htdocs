<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>订单返利管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/style.css" />
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/common.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/view.js"></script>
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
    <form class="form-inline definewidth m20" action="?" method="get">
        地址关键字：
        <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" onclick="addRow()" id="addnew">新增</button>
    </form>
    <br/>
    <form class="form-inline definewidth m20" action="?" method="post">
        <table id="table" name="data" class="table table-bordered table-hover definewidth m10" cellpadding="3">
            <thead>
                <tr>
                    <td>编号</td>
                    <td>问题</td>
                    <td>A选项</td>
                    <td>B选项</td>
                    <td>C选项</td>
                    <td>D选项</td>
                    <td>操作</td>
                </tr>
                <tr>
                    <td>
                        <p>1</p>
                    </td>
                    <td>
                        <input value="" name="data[1][que]" type="text">
                    </td>
                    <td>
                        <input value="" name="data[1][a]" type="text">
                    </td>
                    <td>
                        <input value="" name="data[1][b]" type="text">
                    </td>
                    <td>
                        <input value="" name="data[1][c]" type="text">
                    </td>
                    <td>
                        <input value="" name="data[1][d]" type="text">
                    </td>
                    <td><a>删除</a></td>
                </tr>
                </tr>
            </thead>
        </table>
</body>
<hr />
<div style="text-align: center;">
    <button type="submit" class="btn btn-primary">保存 </button>&nbsp;&nbsp;
    <div>
        </form>

</html>
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
    newTd1.innerHTML = '<input  value="" name=data['+rows+'][que] type="text" >';
    newTd2.innerHTML = '<input  value="" name=data['+rows+'][a] type="text" >';
    newTd3.innerHTML = '<input  value="" name=data['+rows+'][b] type="text" >';
    newTd4.innerHTML = '<input value=""  name=data['+rows+'][c] type="text" >';
    newTd5.innerHTML = '<input  value="" name=data['+rows+'][d] type="text" >';
    newTd6.innerHTML = '<a>删除</a>';
}

// function table() {

// alert(document.getElementsByTagName('que[2]').value);
//     // var url = "<?php echo U('index/lessons_add');?>?id=1";
//     // window.location.href = url;
// }
</script>