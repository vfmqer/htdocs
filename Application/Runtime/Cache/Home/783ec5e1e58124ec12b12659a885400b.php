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
        <td width="10%" class="tableleft">门店名称</td>
        <td><p><?php echo ($address["storename"]); ?></p></td>
    </tr>
        <tr>
        <td class="tableleft">门店联系人</td>
        <td><input type="text" value="<?php echo ($address["contacts"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">门店百度X,Y坐标</td>
        <td><input type="text" value="<?php echo ($address["xy"]); ?>"/></td>
    </tr>
        <tr>
        <td class="tableleft">门店地址</td>
        <td><input type="text" value="<?php echo ($address["address"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">联系电话</td>
        <td><input type="text" value="<?php echo ($address["tel"]); ?>"/></td>
    </tr> 
    <input type="hidden" name="id" value="<?php echo ($address["id"]); ?>">
    <!-- <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="data[status]" value="1" checked/> 启用
           <input type="radio" name="data[status]" value="0"/> 禁用
            <input type="hidden" name="id" value="<?php echo ($message["id"]); ?>">
        
        </td>
    </tr> -->
   <!--  <tr>
        <td class="tableleft">角色</td>
        <td><?php echo ($role_checkbox); ?></td>
    </tr> -->
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>