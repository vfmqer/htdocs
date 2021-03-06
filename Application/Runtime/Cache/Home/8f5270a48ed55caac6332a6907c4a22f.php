<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title></title>
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
    <form action="?" method="post" class="definewidth m20">
        <table class="table table-bordered table-hover definewidth m10">
            <tr>
                <td width="10%" class="tableleft">用户名</td>
                <td width="70%">
                    <p><?php echo ($message["username"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">留言类型</td>
                <td>
                    <p><?php echo ($message["type"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">真实姓名</td>
                <td>
                    <p><?php echo ($message["turename"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">手机号码</td>
                <td>
                    <p><?php echo ($message["tel"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">留言时间</td>
                <td>
                    <p><?php echo ($message["replytime"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">详细地址</td>
                <td>
                    <p><?php echo ($message["address2"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">留言内容</td>
                <td>
                    <p style="margin: 0px 0px 10px; width: 1000px;"><?php echo ($message["content"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">回复</td>
                <td>
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="data[reply]" type="text/plain"></script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                    var ue = UE.getEditor('container', {
                        initialFrameWidth: 700,
                        initialFrameHeight: 260,
                        autoHeightEnabled: false,

                    });
                    ue.ready(function() {
                        //设置编辑器的内容
                        ue.setContent('<?php echo ($message["reply"]); ?>');
                        //获取html内容，返回: <p>hello</p>
                        var html = ue.getContent();
                        //获取纯文本内容，返回: hello
                        var txt = ue.getContentTxt();
                    });
                    </script>
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($message["id"]); ?>">
            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">回复</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<script>
$(function() {
    $('#backid').click(function() {
        history.back();
    });

});
</script>