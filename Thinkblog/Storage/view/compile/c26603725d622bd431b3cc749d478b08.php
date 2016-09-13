<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">lid</th>
			  <th>链接名称</th>
			  <th>URL地址</th>
			  <th>链接图片</th>
			  <th>排序</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($linkData as $v){?>
			<tr>
				<td><?php echo $v["lid"]?></td>
				<td><a href=""><?php echo $v["lname"]?></a></td>
				<td><?php echo $v['url']?></td>
				<td><img src="<?php echo $v['logo']?>" alt=""></td>
				<td><?php echo $v['sort']?></td>
				<td>
					<a href="<?php echo U('edit',array('lid'=>$v['lid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='<?php echo U('del',array('lid'=>$v['lid']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
