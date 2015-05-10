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
                <td width="15%" class="tableleft">编号</td>
                <td>
                    <p><?php echo ($order["id"]); ?></p>
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($order["id"]); ?>" />
            <tr>
                <td width="15%" class="tableleft">用户名</td>
                <td>
                    <input type="text" name="data[username]" value="<?php echo ($order["username"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">定单名称</td>
                <td>
                    <input type="text" name="data[ordername]" value="<?php echo ($order["ordername"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">订单编号</td>
                <td>
                    <input type="text" name="data[orderid]" value="<?php echo ($order["orderid"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">定单对应产品编号</td>
                <td>
                    <input type="text" name="data[productid]" value="<?php echo ($order["productid"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">交易时间</td>
                <td>
                    <input type="text" name="data[transactiontime]" value="<?php echo ($order["transactiontime"]); ?>" />
                    <p>like 2015-12-20 15:32:32</p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">订单状态</td>
                <td>
                    <input type="text" name="data[state]" value="<?php echo ($order["state"]); ?>" />
                    <p>交易状态(0.已下单；1.已支付；2.已返利）</p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">最后修改时间</td>
                <td>
                    <p><?php echo ($order["lasttime"]); ?></p>
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