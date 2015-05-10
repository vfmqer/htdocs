<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>留言管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public//htdocs/Public/Css/bootstrap-responsive.css" />
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
        <input type="radio" name="data[state]" value="全部" /> 全部
        <input type="radio" selected="selected" name="data[state]" value="未回复" checked/> 未回复
        <input type="radio" name="data[state]" value="已回复" /> 已回复
        <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>"> &nbsp;&nbsp;&nbsp;&nbsp;
        <select name="data[type]">
            <option selected="selected" value="全部">所有类型</option>
            <option value="网店信息">网店信息</option>
            <option value="加盟合作">加盟合作</option>
            <option value="线上投诉">线上投诉</option>
            <option value="意见反馈">意见反馈</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp; 留言内容关键字：
        <input type="text" name="data[content]" id="content" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>
        <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/page.css" />
        <!-- 导入Page样式的样式表 -->
    </form>
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>留言ID</th>
                <th>用户名</th>
                <th>姓名</th>
                <th>留言类型</th>
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
                <td width="4%"><?php echo ($vo["id"]); ?></td>
                <td width="2%"><?php echo ($vo["username"]); ?></td>
                <td width="3%"><?php echo ($vo["turename"]); ?></td>
                <td width="5%"><?php echo ($vo["type"]); ?></td>
                <td width="5%"><?php echo ($vo["tel"]); ?></td>
                <td width="5%"><?php echo ($vo["email"]); ?></td>
                <td width="6%"><?php echo ($vo["address"]); ?></td>
                <td width="18%" height="3em"><?php echo ($vo["content"]); ?></td>
                <td width="18%" height="3em"><?php echo ($vo["reply"]); ?></td>
                <td width="7%"><?php echo ($vo["replytime"]); ?></td>
                <td width="7%"><?php echo ($vo["sendtime"]); ?></td>
                <td width="5%"><?php echo ($vo["state"]); ?></td>
                <td width="5%">
                    <a href="<?php echo U('Index/message_edit');?>?id=<?php echo ($vo["id"]); ?>">回复</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
    <hr />
    <div class="green-black"><?php echo ($page); ?>
        <div/>
        <!-- page方法显示分页 -->
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
        var url = "<?php echo U('index/message_delete');?>";
        window.location.href = url;
    }
}
</script>