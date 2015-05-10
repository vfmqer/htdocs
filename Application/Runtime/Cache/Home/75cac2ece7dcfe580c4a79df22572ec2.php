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
    用户名称：
    <input type="text" name="data[username]" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增管理员</button>
</form>

<form class="form-inline definewidth m20" action="?" method="get">    
    用户姓名：
    <input type="text" name="data[truename]" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<link rel="stylesheet" type="text/css" href="/Public/Css/page.css" /> 

<div>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户id</th>
        <th>用户名</th>
        <th>真实姓名</th>
        <th>手机号码</th>
        <th>条形码</th>
        <th>积分</th>
        <th>用户类型</th>
        <th>推荐人</th>
        <th>操作</th>
    </tr>
    </thead>
	     <!-- <tr>
            <td>2</td>
            <td>admin</td>
            <td>管理员</td>
            <td></td>
            <td>
                <a href="edit.html">编辑</a>                
            </td>
        </tr> -->	

        <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
            <td> <?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td><?php echo ($vo["truename"]); ?></td>
            <td><?php echo ($vo["phone"]); ?></td>
            <td><?php echo ($vo["barcode"]); ?></td>
            <td><?php echo ($vo["integral"]); ?></td>
            <td><?php echo ($vo["type"]); ?></td>
            <td><?php echo ($vo["recommend"]); ?></td>
            <td>
                <a href="<?php echo U('Index/admin_edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a>                
                <a href="<?php echo U('Index/admin_delete');?>?id=<?php echo ($vo["id"]); ?>">删除</a>                         
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

				window.location.href="<?php echo U('admin_add');?>";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>