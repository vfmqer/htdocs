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
        <td width="10%" class="tableleft">登录名</td>
        <td><input type="text" disabled value="<?php echo ($user["username"]); ?>"/></td>
    </tr>
   
    <tr>
        <td class="tableleft">真实姓名</td>
        <td><input type="text" name="data[truename]" value="<?php echo ($user["truename"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">手机号码</td>
        <td><input type="text" name="data[phone]" value="<?php echo ($user["phone"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">用户等级</td>
        <td><input type="text" name="data[vip]" value="<?php echo ($user["vip"]); ?>"/></td>
    </tr>
    <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
    <!-- <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="data[status]" value="1" checked/> 启用
           <input type="radio" name="data[status]" value="0"/> 禁用
            <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
        
        </td>
    </tr> -->
   <!--  <tr>
        <td class="tableleft">角色</td>
        <td><?php echo ($role_checkbox); ?></td>
    </tr> -->
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				history.back();
		 });

    });
</script>