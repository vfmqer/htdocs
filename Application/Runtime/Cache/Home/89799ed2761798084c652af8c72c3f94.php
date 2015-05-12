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
                <td width="10%" class="tableleft">是否开放注册</td>
                <td>
                    <input type="text" style="width:50%;" name="data[openregedit]" value="<?php echo ($aboutus["openregedit"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">注册协议</td>
                <td>
                    <textarea name="data[agreement]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"><?php echo ($aboutus["agreement"]); ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="tableleft">企业介绍</td>
                <td>
                    <input type="text" style="width:50%;" name="data[introduction]" value="<?php echo ($aboutus["introduction"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">关于我们</td>
                <td>
                    <input type="text" style="width:50%;" name="data[aboutus]" value="<?php echo ($aboutus["aboutus"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">APP版本</td>
                <td>
                    <input type="text" style="width:50%;" name="data[appedition]" value="<?php echo ($aboutus["appedition"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">APP下载地址</td>
                <td>
                    <input type="text" style="width:50%;" name="data[appdowload]" value="<?php echo ($aboutus["appdowload"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">企业网址</td>
                <td>
                    <input type="text" style="width:50%;" name="data[enterpriseweb]" value="<?php echo ($aboutus["enterpriseweb"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">设置时间</td>
                <td>
                    <input type="text" style="width:50%;" name="data[settime]" value="<?php echo ($aboutus["settime"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">最后修改时间</td>
                <td>
                    <input type="text" style="width:50%;" name="data[endtime]" value="<?php echo ($aboutus["endtime"]); ?>" />
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($aboutus["id"]); ?>">
            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">修改</button> &nbsp;&nbsp;
                </td>
            </tr>
        </table>
    </form>
</body>

</html>