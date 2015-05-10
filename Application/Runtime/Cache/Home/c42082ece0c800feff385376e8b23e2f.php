<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>留言管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public//Public/Css/bootstrap-responsive.css" />
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
        <button type="submit" class="btn btn-primary">查询</button>
        <!-- &nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增会员</button> -->
        <link rel="stylesheet" type="text/css" href="/Public/Css/page.css" />
    </form>
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>留言ID</th>
                <th>用户名</th>
                <th>姓名</th>
                <th>电话</th>
                <th>邮箱</th>
                <th>地址</th>
                <th>留言内容</th>
                <th>回复内容</th>
                <th>留言时间</th>
                <th>回复时间</th>
                <th>回复状态</th>
                <th>操作</th>
            </tr>
        </thead>

        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
            <td width="3%"><?php echo ($vo["id"]); ?></td>
            <td width="2%"><?php echo ($vo["username"]); ?></td>
            <td width="3%"><?php echo ($vo["turename"]); ?></td>
            <td width="5%"><?php echo ($vo["tel"]); ?></td>
            <td width="5%"><?php echo ($vo["email"]); ?></td>
            <td width="6%"><?php echo ($vo["address"]); ?></td>
            <td width="20%" height="3em"><?php echo ($vo["content"]); ?></td>
            <td width="20%" height="3em"><?php echo ($vo["reply"]); ?></td>
            <td width="7%"><?php echo ($vo["replytime"]); ?></td>
            <td width="7%"><?php echo ($vo["sendtime"]); ?></td>
            <td width="6%"><?php echo ($vo["state"]); ?></td>
            <td>
                <a href="<?php echo U('Index/message_edit');?>?id=<?php echo ($vo["id"]); ?>">回复</a>
            </td>
        </tr><?php endforeach; endif; ?>
    </table>
    <hr />
<div class="green-black"><?php echo ($page); ?><div/>

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
        var url = "index.html";
        window.location.href = url;
    }
}
</script>