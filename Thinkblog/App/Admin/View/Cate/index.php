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
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th width="30">cid</th>
			  <th>分类名称</th>
			  <th>排序</th>
			  <th width="210">操作</th>
			</tr>
			<tr>
				{{foreach from='$data' value='$v'}}
				<td>{{$v["cid"]}}</td>
				<td>{{$v["_name"]}}</td>
				<td>{{$v["csort"]}}</td>
				<td>
					<a href="{{U('addSon',array('cid'=>$v['cid']))}}" class="btn btn-sm btn-primary">添加子类</a>
					<a href="{{U('edit',array('cid'=>$v['cid']))}}" class="btn btn-sm btn-warning">编辑</a>
					{{if value="$v['arcTotal']==0"}}
						<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('del',array('cid'=>$v['cid']))}}';" class="btn btn-sm btn-danger">删除</a>
					{{else}}
						<a href=""  class="btn btn-sm btn-danger disabled">删除</a>
					{{endif}}
				</td>
			</tr>
			{{endforeach}}
		</table>
	</body>
</html>
