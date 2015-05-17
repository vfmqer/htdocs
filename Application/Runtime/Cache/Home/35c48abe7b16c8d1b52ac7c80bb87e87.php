<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>资讯管理</title>
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
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/page.css" />
    <!-- 导入Page样式的样式表 -->
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>ID</th>
                <th>资讯名称</th>
                <th>资讯类型</th>
                <th>资讯摘要</th>
                <th>资讯内容</th>
                <th>新闻图片</th>
                <th>点击次数</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["type"]); ?></td>
                <td><?php echo ($vo["remark"]); ?></td>
                <td><?php echo ($vo["contect"]); ?></td>
                <td><?php echo ($vo["img"]); ?></td>
                <td><?php echo ($vo["read"]); ?></td>
                <td><?php echo ($vo["date"]); ?></td>
                <td><a href="<?php echo U('index/news_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>
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
        window.location.href = "<?php echo U('index/news_add');?>";
    });
});

function del(id) {
    if (confirm("确定要删除吗？")) {
        var link="<?php echo U('index/news_delete');?>?id="+id;
        window.location.href = link;
    }
}
</script>