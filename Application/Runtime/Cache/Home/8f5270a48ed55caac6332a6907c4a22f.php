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
        <td><p><?php echo ($message["username"]); ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">留言类型</td>
        <td><p><?php echo ($message["type"]); ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">真实姓名</td>
        <td><p><?php echo ($message["turename"]); ?></p></td>
    </tr> 
    <tr>
        <td class="tableleft">手机号码</td>
        <td><p><?php echo ($message["tel"]); ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">留言时间</td>
        <td><p><?php echo ($message["replytime"]); ?></p></td>
    </tr>    
        <tr>
        <td class="tableleft">详细地址</td>
        <td><p><?php echo ($message["address2"]); ?></p></td>
    </tr>   
    <tr>
        <td class="tableleft">留言内容</td>
        <td><p style="margin: 0px 0px 10px; width: 80%;"><?php echo ($message["content"]); ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">回复</td>
        <td><textarea name="data[reply]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"><?php echo ($message["reply"]); ?></textarea>
        </td>
    </tr>
    <input type="hidden" name="id" value="<?php echo ($message["id"]); ?>">
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
            <button type="submit" class="btn btn-primary" type="button">回复</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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