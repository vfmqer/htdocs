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
                <td width="10%" class="tableleft">资讯名称</td>
                <td>
                    <input type="text" name="data[title]" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯类型</td>
                <td>
                    <select name="data[type]" style="width:210px">
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
                <td>
                    <input type="file" name="data[img]" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯摘要</td>
                <td>
                    <input type="text" name="data[remark]" style="width:100px" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">资讯详情</td>
                <td>
                    <textarea name="data[contect]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"></textarea>
                </td>
            </tr>
            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;
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