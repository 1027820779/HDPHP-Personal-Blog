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
		<form action="" method="post">
		<div class="alert alert-success">编辑</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称"  name="cname" value="{{$datas["cname"]}}">
		</div>
        <div class="form-group">
                <label for="exampleInputEmail1">所属分类</label>
                <select name="pid" class="form-control">
                    <option value="0">顶级分类</option>
                    <!--处理父级分类-->
                    {{foreach from="$cateData" value="$v"}}
                    <option value="{{$v['cid']}}" {{if value="$datas['pid'] == $v['cid']"}}selected{{endif}} >{{$v['_name']}}</option>
                    {{endforeach}}
                </select>
        </div>
        <input type="hidden" name="cid" value='{{$datas["cid"]}}'/>
		<div class="form-group">
			<label for="exampleInputEmail1">分类标题</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类标题"  name="ctitle" value="{{$datas["ctitle"]}}">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类关键字</label>
			<textarea name="ckeywords" rows="5" cols=""  class="form-control" placeholder="请输入分类关键字">{{$datas["cdes"]}}</textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类描述</label>
			<textarea name="cdes" rows="5" cols=""  class="form-control" placeholder="请输入分类描述">{{$datas["ckeywords"]}}</textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="csort" value="{{$datas['csort']}}">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
