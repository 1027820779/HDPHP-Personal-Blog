
		<!--载入公共模板-->
	<link rel="shortcut icon" href="./Public/Home/img/favicon.ico" />
    <link rel="stylesheet" href="./Public/Home/font/iconfont.css"/>
    <link rel="stylesheet" href="./Public/Home/font/new/iconfont.css"/>
	<link rel="stylesheet" href="./Public/Home/css/commun.css" />
	<link rel="stylesheet" href="./Public/Home/css/bindex.css" />
    <script src="./Public/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<!-- header -->
<div class="header">
	<div class="w1170 header_box">
		<div class="left_log">
            <a href="index.php"><img src="./Public/Home/img/tarqat_logo.png" alt="" /></a>
            <p></p>
		</div>
		<?php     	// 获得顶级分类，导航条
    	$cateModel=new \Common\Model\Cate;
    	$data=$cateModel->where('pid=0')->orderBy("csort","ASC")->get();?>
		<div class="menu_log">
			<a href="index.php" {{if value="'CONTROLLER' eq 'Index'"}}class="active_menu"{{endif}}>首页</a>
			{{foreach from="$data" value="$v"}}
			<a {{if value="$v['cid'] eq Q('get.cid',0,'intval')"}}class="active_menu"{{endif}} href="con-l{{$v['cid']}}.html">{{$v['cname']}}</a>
			{{endforeach}}
		</div>
	</div>
</div>
<div class="clear"></div>