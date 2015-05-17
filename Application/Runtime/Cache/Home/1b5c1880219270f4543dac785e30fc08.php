<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>地址管理</title>
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
    <form class="form-inline definewidth m20" action="?" method="get">
        地址关键字：
        <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" id="addnew">新增</button>
    </form>
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/page.css" />
    <!-- 导入Page样式的样式表 -->
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>编号</th>
                <th>门店名称</th>
                <th>门店联系人</th>
                <th>门店百度XY坐标</th>
                <th>门店地址</th>
                <th>门店联系电话</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php if(is_array($resultaddress)): foreach($resultaddress as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["storename"]); ?></td>
                <td><?php echo ($vo["contacts"]); ?></td>
                <td><?php echo ($vo["xy"]); ?></td>
                <td><?php echo ($vo["address"]); ?></td>
                <td><?php echo ($vo["tel"]); ?></td>
                <td>
                    <a href="<?php echo U('Index/address_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>
                    <a href="<?php echo U('Index/address_delete');?>?id=<?php echo ($vo["id"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
<div class="green-black"><?php echo ($page); ?>
    <div/>
    <!-- page方法显示分页 -->

</html>
<script>
$(function() {
    $('#addnew').click(function() {
        window.location.href = "<?php echo U('address_add');?>";
    });
});

function del(id) {
    if (confirm("确定要删除吗？")) {
        var url = "index.html";
        window.location.href = url;
    }
}
</script>