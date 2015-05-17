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
                <th>用户名</th>
                <th>下一级返利金额</th>
                <th>下二级返利金额</th>
                <th>下三级返利金额</th>
                <th>返利总和</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td><?php echo ($vo["rebate1"]); ?></td>
            <td><?php echo ($vo["rebate2"]); ?></td>
            <td><?php echo ($vo["rebate3"]); ?></td>
            <td><?php echo ($vo["allrebate"]); ?></td>
            <td>
                <a href="<?php echo U('index/rebate_look');?>?username=<?php echo ($vo["username"]); ?>">查看详情</a>
                <!-- <a href="#" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a> -->
            </td>
        </tr><?php endforeach; endif; ?>
    </table>
</body>

</html>
<script>
$(function() {
    $('#addnew').click(function() {
        window.location.href = "add.html";
    });
});

function del(id) {
    if (confirm("确定要删除吗？")) {
        var url = "<?php echo U('index/rebate_delete');?>?id="+id;
        window.location.href = url;
    }
}
</script>