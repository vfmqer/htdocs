<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="/Public/Css/page.css" /> 

<div>
	   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
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
</div>


<hr/>
<div class="green-black"><?php echo ($page); ?><div/>

</body>
</html>