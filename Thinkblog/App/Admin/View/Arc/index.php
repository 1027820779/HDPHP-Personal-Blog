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
	    <style>
			#page li{
				margin-right: 0px;
			}
	    </style>
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">aid</th>
			  <th>标题</th>
			  <th width="100">分类</th>
			   <th>发布时间</th>
			  <th width="200">操作</th>
			</tr>
			{{foreach from="$data" value="$v"}}
			<tr>
				<td>{{$v['aid']}}</td>
				<td>{{$v["title"]}}</td>
				<td>{{$v["cname"]}}</td>
				<td>{{date('Y-m-d H:i:s',$v['sendtime'])}}</td>
				<td>
					<a href="{{U('edit',array('aid'=>$v['aid']))}}" class="btn btn-sm btn-primary">编辑</a>
					<a href="{{U('del',array('aid'=>$v['aid']))}}" class="btn btn-sm btn-warning">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
				<center>
			<div class="pagination">
				<ul id="page">
					{{$page}}
				</ul>
			</div>
		</center>
	</body>
</html>
