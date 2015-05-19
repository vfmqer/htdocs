<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>产品类型管理</title>
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
    </form>
    <link rel="stylesheet" type="text/css" href="/Public/Css/page.css" />
    <!-- 导入Page样式的样式表 -->
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>编号</th>
                <th>产品名称</th>
                <th>类型ID</th>
                <th>产品类型</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["typename"]); ?></td>
                <td><?php echo ($vo["typeid"]); ?></td>
                <td><?php echo ($vo["typeclass"]); ?></td>
                <td><a href="<?php echo U('index/producttype_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>
                    <a href="#" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
    <hr />
    <div class="green-black "><?php echo ($page); ?>
        <div/>
        <!-- page方法显示分页 -->
</body>

</html>
<script>
$(function() {
    $('#addnew').click(function() {
        window.location.href = "<?php echo U('index/producttype_add');?>";
    });
});

function del(id) {
    if (confirm("确定要删除吗？")) {
        var link="<?php echo U('index/producttype_delete');?>?id="+id;
        window.location.href = link;
    }
}
</script>