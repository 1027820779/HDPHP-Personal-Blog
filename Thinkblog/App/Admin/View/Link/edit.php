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
		<form action="" method="post" enctype="multipart/form-data">
		<div class="alert alert-success">编辑友链</div>
		<div class="form-group">
			<label for="exampleInputEmail1">名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text"  name="lname" value="{{$oldData['lname']}}">
		</div>
		
		<script src="Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				// 点击关闭图片按钮
				$(".close_img").click(function(){
					// 删除图片元素
					var str='<label for="exampleInputEmail1">logo</label><input id="exampleInputEmail1" class="form-control" type="file" name="logo">';
					$("#upload_box").html(str);
				})
			})
		</script>
		<div class="form-group" id="upload_box">
			<!-- 如果有缩略图的时候 -->
			{{if value="$oldData['logo']"}}
			<img src="{{$oldData['logo']}}" width='81' alt="">
			<a href="javascript:;" class="close_img">X</a>
			<input type="hidden" name="logo" value="{{$oldData['logo']}}"/>
			{{else}}
			<label for="exampleInputEmail1">logo</label>
			<input id="exampleInputEmail1" class="form-control" type="file" name="logo">
			{{endif}}
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">url地址</label>
			<input id="exampleInputEmail1" class="form-control" type="text"  name="url" value="{{$oldData['url']}}">
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="sort" value="{{$oldData['sort']}}">
		</div>
		
		<input type="hidden" name="lid" value="{{$oldData['lid']}}"/>

		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
