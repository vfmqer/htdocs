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
        <td width="10%" class="tableleft">用户</td>
        <td><p><?php echo ($result["username"]); ?></p></td>
    </tr>
    <tr>
        <td class="tableleft">一级返利明细</td>
        <td>
        <?php if(is_array($result['result1'])): foreach($result['result1'] as $key=>$vo): ?><p><?php echo ($vo["downuser"]); ?></p>
        <p><?php echo ($vo["backmoney"]); ?></p>
        <p><?php echo ($vo["time"]); ?></p>
        <hr /><?php endforeach; endif; ?>
        </td>
    </tr>
    <tr>
        <td class="tableleft">二级返得合计</td>
        <td>
        <?php if(is_array($result['result2'])): foreach($result['result2'] as $key=>$vo): ?><p><?php echo ($vo["downuser"]); ?></p>
        <p><?php echo ($vo["backmoney"]); ?></p>
        <p><?php echo ($vo["time"]); ?></p>
        <hr /><?php endforeach; endif; ?>         
        </td>
    </tr> 
    <tr>
        <td class="tableleft">三级返利明细</td>
        <td>
        <?php if(is_array($result['result3'])): foreach($result['result3'] as $key=>$vo): ?><p><?php echo ($vo["downuser"]); ?></p>
        <p><?php echo ($vo["backmoney"]); ?></p>
        <p><?php echo ($vo["time"]); ?></p>
        <hr /><?php endforeach; endif; ?>         
        </td>
    </tr> 
    <input type="hidden" name="id" value="<?php echo ($message["id"]); ?>">

    <tr>
        <td class="tableleft"></td>
        <td>
            <!-- <button type="submit" class="btn btn-primary" type="button">回复</button> &nbsp;&nbsp; --><button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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