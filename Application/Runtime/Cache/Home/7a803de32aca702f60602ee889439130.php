<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
<form class="form-inline definewidth m20" action="?" method="get">    
    滤心名称：
    <input type="text" name="data[username]" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增滤心</button>
</form>
<link rel="stylesheet" type="text/css" href="/Public/Css/page.css" /> 

<div>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>编号</th>
        <th>滤心名称</th>
        <th>滤心寿命</th>
        <th>滤心等级</th>
        <th>创建时间</th>
        <th>最后修改时间</th>
        <th>操作</th>
    </tr>
    </thead>
        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
            <td> <?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["life"]); ?></td>
            <td><?php echo ($vo["level"]); ?></td>
            <td><?php echo ($vo["time"]); ?></td>
            <td><?php echo ($vo["endtime"]); ?></td>
            <td>
                <a href="<?php echo U('Index/filter_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>                
                <a href="#" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a>                         
            </td>
        </tr><?php endforeach; endif; ?>
</table>
</div>
<hr />

<div class="green-black"><?php echo ($page); ?><div/>

</body>
</html>
<script>
    $(function () {
        

        $('#addnew').click(function(){

                window.location.href="<?php echo U('filter_add');?>";
         });


    });

    function del(id)
    {
        
        
        if(confirm("确定要删除吗？"))
        {
        
            var url = "<?php echo U("index/filter_delete");?>?id="+id;
            
            window.location.href=url;       
        
        }
    
    
    
    
    }
</script>