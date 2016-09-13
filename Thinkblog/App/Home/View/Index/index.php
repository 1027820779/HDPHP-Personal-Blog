<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>知识传播-tarqat.com</title>
    {{include file="VIEW_PATH/Common/header.php"}}
<!-- body -->
<div class="body">
	<div class="w1170 body_box">
		<div class="left_content">
            {{foreach from="$arcData" value="$v"}}
			<div class="content_box">
				<div class="title_info">
                    <div class="title"><a href="a{{$v['aid']}}.html">{{$v['title']}}</a></div>
                    <div class="cate_info">
                        <span>作者:{{$v['author']}}</span>&nbsp;&nbsp;
                        <span><i class="icon iconfont">&#xe61b;</i> {{date('Y-m-d H:i:s',$v['sendtime'])}}</span>&nbsp;
                        <span>分类:<a href="con-l{{$v['cid']}}.html">{{$v['cname']}}</a></span>
                    </div>

				</div>
                {{if value="$v['thumb']"}}
                <div class="thumb_frame">
                    <img class="thumb" src="{{$v['thumb']}}" alt=""/>
                    <div class="thumb_cover"><a href="a{{$v['aid']}}.html">阅读全文</a></div>
                </div>
                {{endif}}
				<div class="content">
					 {{$v['digest']}}
				</div>
                <div class="content_line"></div>
				<div class="info">
					<i class="icon iconfont">&#xe607;</i>
                    {{foreach from="$v['tag']" value="$tag"}}
                    <a class="good"  href="con-t{{$tag['tid']}}.html">{{$tag['tname']}}</a><span>、</span>
                    {{endforeach}}
                    <a class="time" href="avascript:void(0);"><i class="icon iconfont">&#xe670;</i> {{$v['click']}}</a>

                </div>
			</div>
            {{endforeach}}


			
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
		{{include file="VIEW_PATH/Common/right.php"}}



	</div>
</div>
<div class="clear"></div>
<!-- footer -->
{{include file="VIEW_PATH/Common/footer.php"}}
