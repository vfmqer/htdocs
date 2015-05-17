<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>引导页管理</title>
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
    <table class="table table-bordered table-hover definewidth m10">
        <thead>
            <tr>
                <th>第一张引导页</th>
                <th>第二张引导页</th>
                <th>第三张引导页</th>
            </tr>
        </thead>
        <tr>
            <td>
                <input type="file" name="guide[img1]">
                <img src="/htdocs/Public/Images/<?php echo ($guide[img1]); ?>">
            </td>
            <td>
                <input type="file" name="guide[img2]">
                <img src="/htdocs/Public/Images/<?php echo ($guide[img2]); ?>">
            </td>
            <td>
                <input type="file" name="guide[img3]">
                <img src="/htdocs/Public/Images/<?php echo ($guide[img3]); ?>">
            </td>
        </tr>
    </table>
    <div style="text-align: center;">
        <form class="form-inline definewidth m20" action="?" method="get">
            <button type="button" class="btn btn-success" id="addnew">更新引导页</button>
        </form>
    </div>
</body>

</html>