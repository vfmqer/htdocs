<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>新增问卷</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/style.css" />
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/common.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/view.js"></script>
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
        <tr>
            <td width="10%" class="tableleft">问卷标题：</td>
            <td><?php echo ($result_number["title"]); ?></td>
        </tr>
        <tr>
            <td class="tableleft">问卷描述</td>
            <td><?php echo ($result_number["destribe"]); ?></td>
        </tr>
        <tr>
            <td class="tableleft">问卷开始时间：</td>
            <td><?php echo ($result_number["starttime"]); ?></td>
        </tr>
        <tr>
            <td class="tableleft">问卷结束时间</td>
            <td><?php echo ($result_number["endtime"]); ?></td>
        </tr>
        <tr>
            <td class="tableleft">有效问卷(份)</td>
            <td><?php echo ($result_number["count"]); ?></td>
        </tr>
    </table>
    <table id="table" name="data" class="table table-bordered table-hover definewidth m10" cellpadding="3">
        <thead>
            <tr>
                <td>编号</td>
                <td>问题</td>
                <td>选项A</td>
                <td>选项B</td>
                <td>选项C</td>
                <td>选项D</td>
            </tr>
            <?php if(is_array($res)): foreach($res as $k=>$vo): ?><tr>
                    <td>
                        <p><?php echo ($k); ?></p>
                    </td>
                    <td>
                        <?php echo ($vo["title"]); ?>
                    </td>
                    <td>
                        <?php echo ($vo["a"]); ?>
                    </td>
                    <td>
                        <?php echo ($vo["b"]); ?>
                    </td>
                    <td>
                        <?php echo ($vo["c"]); ?>
                    </td>
                    <td>
                        <?php echo ($vo["d"]); ?>
                    </td>
                </tr>
                </tr><?php endforeach; endif; ?>
        </thead>
    </table>
</body>
<hr />
<div style="text-align: center;">
    <button type="botton" class="btn btn-primary">返回 </button>&nbsp;&nbsp;
    <div>
        </form>

</html>