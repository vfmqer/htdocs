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
                <td width="10%" class="tableleft">产品名称</td>
                <td>
                    <input type="text" name="data[name]" value="<?php echo ($product["name"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品价格</td>
                <td>
                    <input type="text" name="data[price]" value="<?php echo ($product["price"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品分类</td>
                <td>
                    <input type="text" name="data[category]" value="<?php echo ($product["category"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">关联文章</td>
                <td>
                    <input type="text" name="data[relatearticles]" value="<?php echo ($product["relatearticles"]); ?>" />
                </td>
            </tr>
<!--             <tr>
                <td class="tableleft">关联网址</td>
                <td>
                    <input type="text" name="data[link]" value="<?php echo ($product["link"]); ?>" />
                </td>
            </tr> -->
            <tr>
                <td class="tableleft">图片地址</td>
                <td>
                    <input type="file" name="data[img1]" value="<?php echo ($product["img"]); ?>" />&nbsp;&nbsp;
                    <input type="file" name="data[img2]" value="<?php echo ($product["img"]); ?>" />&nbsp;&nbsp;
                    <input type="file" name="data[img3]" value="<?php echo ($product["img"]); ?>" />&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品详情</td>
                <td>
                    <!-- <textarea name="data[details]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"><?php echo ($product["details"]); ?></textarea> -->
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="data[details]" type="text/plain"></script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                    var ue = UE.getEditor('container', {
                        initialFrameWidth: 1000,
                        initialFrameHeight: 260,
                        autoHeightEnabled: false,

                    });
                    ue.ready(function() {
                        //设置编辑器的内容
                        ue.setContent('<?php echo ($product["details"]); ?>');
                        //获取html内容，返回: <p>hello</p>
                        var html = ue.getContent();
                        //获取纯文本内容，返回: hello
                        var txt = ue.getContentTxt();
                    });
                    </script>
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($product["id"]); ?>">
            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">提交</button> &nbsp;&nbsp;
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