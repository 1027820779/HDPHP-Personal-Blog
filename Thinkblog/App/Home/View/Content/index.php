<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>知识传播-tarqat.com</title>
	{{include file="VIEW_PATH/Common/header.php"}}
    <link rel="stylesheet" href="./Public/Home/css/content.css" />
<!-- body -->
<div class="body">
	<div class="w1170 body_box">
		<div class="left_content">

			<div class="content_box">
				<div class="title_info">
                    <div class="title"><a href="javascript:;">{{$data['title']}}</a></div>
                    <div class="cate_info">
                        <span>作者:{{$data['author']}}</span>&nbsp;&nbsp;
                        <span><i class="icon iconfont">&#xe61b;</i> {{date('Y-m-d H:i:s')}}</span>&nbsp;
                        <span>分类:<a href="con-l{{$data['cid']}}.html">{{$data['cname']}}</a></span>
                    </div>

				</div>
                <!--内容-->
				<div class="content">
				{{$data['content']}}
				</div>
                <div class="content_line"></div>
				<div class="info">
					<i class="icon iconfont">&#xe607;</i>
					{{foreach from="$data['tag']" value="$v"}}
                    <a class="good"  href="con-t{{$v['tid']}}.html">{{$v['tname']}}</a><span>、</span>
                    {{endforeach}}
                    <a class="time" href="avascript:void(0);"><i class="icon iconfont">&#xe670;</i> {{$data['click']}}</a>

                </div>
			</div>




		<!-- 评论 -->
		<div class="ping" style="width:801px;height: auto;">
									<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="{{$data['aid']}}" data-title="{{$data['title']}}" data-url="{{U('Content/index',array('aid'=>$data['aid']))}}"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"tarqat"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->
		</div>
		</div>

        <!--右边部分-->
		{{include file="VIEW_PATH/Common/right.php"}}



	</div>
</div>
<div class="clear"></div>
<!-- footer -->
{{include file="VIEW_PATH/Common/footer.php"}}