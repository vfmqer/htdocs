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
                <td class="tableleft">编号</td>
                <td>
                    <p><?php echo ($productRebate["id"]); ?></p>
                </td>
            </tr>
            <tr>
                <td width="10%" class="tableleft">产品名称</td>
                <td>
                    <input type="text" name="data[name]" value="<?php echo ($productRebate["name"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品价格</td>
                <td>
                    <input type="text" name="data[price]" value="<?php echo ($productRebate["price"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品分类</td>
                <td>
                    <input type="text" name="data[category]" value="<?php echo ($productRebate["category"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">关联链接</td>
                <td>
                    <input type="text" name="data[relatearticles]" value="<?php echo ($productRebate["relatearticles"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">返利金额</td>
                <td>
                    <span>第一级返利金额:</span>
                    <input style="width:50px" type="text" name="data[backmoney1]" value="<?php echo ($productRebate["backmoney1"]); ?>" />&nbsp;&nbsp;
                    <span>第二级返利金额:</span>
                    <input style="width:50px" type="text" name="data[backmoney2]" value="<?php echo ($productRebate["backmoney2"]); ?>" />&nbsp;&nbsp;
                    <span>第三级返利金额:</span>
                    <input style="width:50px" type="text" name="data[backmoney3]" value="<?php echo ($productRebate["backmoney3"]); ?>" />
                </td>
            </tr>
            <tr>
                <td class="tableleft">新增时间</td>
                <td>
                    <p><?php echo ($productRebate["time"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">最后修改时间</td>
                <td>
                    <p><?php echo ($productRebate["lasttime"]); ?></p>
                </td>
            </tr>
            <tr>
                <td class="tableleft">图片地址</td>
                <td>
                    <input type="file" name="data[img]" value="<?php echo ($productRebate["img"]); ?>" />&nbsp;&nbsp;
                    <input type="file" name="data[img]" value="<?php echo ($productRebate["img"]); ?>" />&nbsp;&nbsp;
                    <input type="file" name="data[img]" value="<?php echo ($productRebate["img"]); ?>" />&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td class="tableleft">产品详情</td>
                <td>
                    <!-- <textarea name="data[details]" style="margin: 0px 0px 10px; width: 80%; height: 233px;resize: none;"><?php echo ($productRebate["details"]); ?></textarea> -->
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="data[details]" type="text/plain"></script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                    var ue = UE.getEditor('container', {
                        initialFrameWidth: 700,
                        initialFrameHeight: 260,
                        autoHeightEnabled: false,

                    });
                    ue.ready(function() {
                        //设置编辑器的内容
                        ue.setContent('<?php echo ($productRebate["details"]); ?>');
                    });
                    </script>
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo ($productRebate["id"]); ?>">
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