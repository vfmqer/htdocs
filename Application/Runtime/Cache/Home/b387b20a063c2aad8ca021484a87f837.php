<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>问卷管理</title>
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
        用户名称：
        <input type="text" name="username" id="username" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" id="addnew">新增</button>
    </form>
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/page.css" />
    <!-- 导入Page样式的样式表 -->
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th width="5%">问卷序号</th>
                <th width="10%">问卷标题</th>
                <th width="20%">问卷描述</th>
                <th width="20%">题目</th>
                <th width="15%">选项</th>
                <th width="15%">活动开始日期－结束日期</th>
                <th width="10%">操作</th>
            </tr>
        </thead>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["destribe"]); ?></td>
                <td><?php echo ($vo["question"]); ?></td>
                <td><?php echo ($vo["option"]); ?></td>
                <td><?php echo ($vo["starttime"]); ?>至<?php echo ($vo["endtime"]); ?></td>
                <td><a href="<?php echo U('index/lessons_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>
                    <a href="<?php echo U('index/lessons_view');?>?id=<?php echo ($vo["id"]); ?>">分析</a>
                    <a href="<?php echo U('index/lessons_delete');?>?id=<?php echo ($vo["id"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; ?>
    </table>
    <div class="green-black"><?php echo ($page); ?>
        <div/>
        <!-- page方法显示分页 -->
</body>

</html>
<script>
$(function() {
    $('#addnew').click(function() {
        window.location.href = "<?php echo U('index/lessons_add');?>";
    });
});

</script>