<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>知识传播-tarqat.com</title>
    
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
				<div class="menu_log">
			<a href="index.php"                 class="active_menu"
               >首页</a>
						<a  href="con-l18.html">程序</a>
						<a  href="con-l21.html">UI</a>
						<a  href="con-l19.html">极客</a>
					</div>
	</div>
</div>
<div class="clear"></div>
<!-- body -->
<div class="body">
	<div class="w1170 body_box">
		<div class="left_content">
            <?php foreach ($arcData as $v){?>
			<div class="content_box">
				<div class="title_info">
                    <div class="title"><a href="a<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></div>
                    <div class="cate_info">
                        <span>作者:<?php echo $v['author']?></span>&nbsp;&nbsp;
                        <span><i class="icon iconfont">&#xe61b;</i> <?php echo date('Y-m-d H:i:s',$v['sendtime'])?></span>&nbsp;
                        <span>分类:<a href="con-l<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a></span>
                    </div>

				</div>
                <?php if($v['thumb']){?>
                
                <div class="thumb_frame">
                    <img class="thumb" src="<?php echo $v['thumb']?>" alt=""/>
                    <div class="thumb_cover"><a href="a<?php echo $v['aid']?>.html">阅读全文</a></div>
                </div>
                
               <?php }?>
				<div class="content">
					 <?php echo $v['digest']?>
				</div>
                <div class="content_line"></div>
				<div class="info">
					<i class="icon iconfont">&#xe607;</i>
                    <?php foreach ($v['tag'] as $tag){?>
                    <a class="good"  href="con-t<?php echo $tag['tid']?>.html"><?php echo $tag['tname']?></a><span>、</span>
                    <?php }?>
                    <a class="time" href="avascript:void(0);"><i class="icon iconfont">&#xe670;</i> <?php echo $v['click']?></a>

                </div>
			</div>
            <?php }?>


			
			<!-- 页码 -->
			<div class="page">
				<ul>
					<li id="p_1"><span>1</span></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li id="more_p"><span>...</span></li>
					<li id="next_p"><a href="">下一页</a></li>
					<li id="all_p">共<span>4</span>页</li>
				</ul>
			</div>

		</div>
        <!--右边部分-->
		<div class="right_content">
            <!--最火文章-->
            			<div class="user_info">
                <li id="fil">最火文章</li>
                                <li class="da_line">
                    <a href="a19.html">手机移动端WEB资源整合</a>
                    <span>2016-01-04</span>
                </li>
                                <li class="da_line">
                    <a href="a16.html">苦逼法国留学生的桌子</a>
                    <span>2016-01-04</span>
                </li>
                                <li class="da_line">
                    <a href="a26.html">把桌面整理了一下，各个角度拍了几张</a>
                    <span>2016-01-04</span>
                </li>
                                <li class="da_line">
                    <a href="a17.html">生活不能没有小创意！</a>
                    <span>2016-01-04</span>
                </li>
                                <li class="da_line">
                    <a href="a18.html">华为P8随拍海南儋州热带植物园</a>
                    <span>2016-01-04</span>
                </li>
                			</div>
            <!--分类-->
			            <div class="category_info">
                <li id="cate_fil">分类列表</li>
                                                
                <a href="con-l10.html">App UI(1)</a>
                                                                
                <a href="con-l18.html">程序(1)</a>
                                                                
                <a href="con-l19.html">极客(5)</a>
                                                                
                <a href="con-l21.html">UI(2)</a>
                                                                
                <a href="con-l20.html">web UI(2)</a>
                                            </div>
            <!--标签-->
			            <div class="tag_info">
                <li id="tag_fil">标签列表</li>
				                <a href="con-t1.html">热门</a>
                                <a href="con-t8.html">JavaScript</a>
                                <a href="con-t3.html">PHP</a>
                                <a href="con-t4.html">CSS3</a>
                                <a href="con-t9.html">Ajax</a>
                                <a href="con-t10.html">CSS</a>
                                <a href="con-t11.html">MySql</a>
                                <a href="con-t12.html">桌面文化</a>
                                <a href="con-t13.html">UI</a>
                                <a href="con-t14.html">拍客</a>
                            </div>
            <!--二维码-->
            <div class="img_info">
                <img src="./Public/Home/img/erweima%20.png" alt=""/>
            </div>

		</div>



	</div>
</div>
<div class="clear"></div>
<!-- footer -->
<div class="footer">
	<div class="w1170 footer_box">
				<ul class="web_link">
		<li id="fi">友情链接</li>
				<li><a href="http://www.baidu.com" target="_blank">百度</a></li>
				<li><a href="http://www.zealer.com" target="_blank">ZEALER</a></li>
				<li><a href="http://www.daqianduan.com" target="_blank">大前端</a></li>
			</ul>
	<ul class="mark">
		<li id="fi">所用的技术</li>
		<li><a href="">HTML</a><a href="">CSS</a></li>
		<li><a href="">JavaScript</a><a href="">CSS3</a></li>
		<li><a href="">PHP</a></li>
	</ul>
	<ul id="connect">
		<li id="fi">联系</li>
		<li class="so"><i class="icon iconfont">&#xe65f;</i>1027820779</li>
		<li class="so"><i class="icon iconfont">&#xe674;</i>铁打的新疆人</a></li>
		<li class="so"><i class="icon iconfont">&#xe63b;</i>13201223537</a></li>
	</ul>
	<a href=""><img src="./Public/Home/img/tarqat_logo.png" alt="" /></a>
	<div class="link_me">联系我们</div>
	</div>
</div>
<!--返回顶部自己写的插件-->
<script src="./Public/Home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        //插件使用
        $('.back_top').backTop({right:40,bottom:37});
    })
</script>
<div class="back_top hidden-xs hidden-md">
    <i class="glyphicon glyphicon-menu-up">^</i>
</div>
</body>
</html>
