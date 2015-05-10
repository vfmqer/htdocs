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
                <td width="10%" class="tableleft">ID</td>
                <td>
                    <p><?php echo ($news['id']); ?></p>
                </td>
            </tr>
            <tr>
                <td width="10%" class="tableleft">资讯名称</td>
                <td>
                    <input type="text" value="<?php echo ($news[title]); ?>" name="news[title]" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯类型</td>
                <td>
                    <select name="news[type]" style="width:210px">
                        <option selected="selected" value="产品安装介绍">产品安装介绍</option>
                        <option value="问题详解">问题详解</option>
                        <option value="健康科谱知识">健康科谱知识</option>
                        <option value="行业信息">行业信息</option>
                        <option value="活动信息">活动信息</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯图片</td>
                <td><img src="/Public/Images/logo_820.jpg" height="20px" />
                    <input value="<?php echo ($news['img']); ?>" type="file" name="news[img]" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯摘要</td>
                <td>
                    <input value="<?php echo ($news['remark']); ?>" type="text" name="news[remark]" style="width:100px" />
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($news["id"]); ?>">
            <tr>
                <td class="tableleft">资讯详情</td>
                <td>
                    <textarea name="news[contect]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"><?php echo ($news['contect']); ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">修改</button> &nbsp;&nbsp;
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