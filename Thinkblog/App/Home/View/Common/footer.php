<div class="footer">
	<div class="w1170 footer_box">
			<?php 
	// 友情链接
	$linkDataModel=new \Common\Model\Link;
	$linkData=$linkDataModel->orderBy("sort",'ASC')->field("lname,url")->limit(3)->get();
	 ?>
	<ul class="web_link">
		<li id="fi">友情链接</li>
		{{foreach from="$linkData" value="$v"}}
		<li><a href="{{$v['url']}}" target="_blank">{{$v['lname']}}</a></li>
		{{endforeach}}
	</ul>
	<ul class="mark">
		<li id="fi">所用的技术</li>
		<li><a href="">HTML</a><a href="">CSS</a></li>
		<li><a href="">JavaScript</a><a href="">CSS3</a></li>
		<li><a href="">PHP</a></li>
	</ul>
	<ul id="connect">
		<li id="fi">联系</li>
		<li class="so"><i class="icon iconfont">&#xe65f;</i>{{C('webset.adminqq')}}</li>
		<li class="so"><i class="icon iconfont">&#xe674;</i>{{C('webset.adminweibo')}}</a></li>
		<li class="so"><i class="icon iconfont">&#xe63b;</i>{{C('webset.adminweixin')}}</a></li>
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