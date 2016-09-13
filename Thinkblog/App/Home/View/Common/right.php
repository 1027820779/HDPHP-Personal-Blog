<div class="right_content">
            <!--最火文章-->
            <?php       // 首页最新篇文章
        $arcModel=new \Common\Model\Arc;
        $arcData=$arcModel->where("is_recycle=0")->orderBy("click",'DESC')->limit(5)->get();
         ?>
			<div class="user_info">
                <li id="fil">最火文章</li>
                {{foreach from="$arcData" value="$v"}}
                <li class="da_line">
                    <a href="a{{$v['aid']}}.html">{{$v['title']}}</a>
                    <span>{{date('Y-m-d',$v['sendtime'])}}</span>
                </li>
                {{endforeach}}
			</div>
            <!--分类-->
			<?php 
			//分类列表
			 $cateModel=new \Common\Model\Cate;
			$cateData=$cateModel->get();
	        //文章模型
	        $arcModel = new \Common\Model\Arc;
	        // 压入文章总数
	        foreach($cateData as $k=>$v){
	            $cateData[$k]['total']=$arcModel->where("category_cid={$v['cid']} and is_recycle=0")->count();
	        }
	        // p($cateData);
	        
			 ?>
            <div class="category_info">
                <li id="cate_fil">分类列表</li>
                {{foreach from="$cateData" value="$v"}}
                {{if value="$v['total']"}}
                <a href="con-l{{$v['cid']}}.html">{{$v['cname']}}({{$v['total']}})</a>
                {{else}}
				<a href="">{{$v['cname']}}</a>
				{{endif}}
                {{endforeach}}
            </div>
            <!--标签-->
			<?php  
			$tagDataModel=new \Common\Model\Tag;
			$tagData=$tagDataModel->get();
			?>
            <div class="tag_info">
                <li id="tag_fil">标签列表</li>
				{{foreach from="$tagData" value="$v"}}
                <a href="con-t{{$v['tid']}}.html">{{$v['tname']}}</a>
                {{endforeach}}
            </div>
            <!--二维码-->
            <div class="img_info">
                <img src="./Public/Home/img/erweima%20.png" alt=""/>
            </div>

		</div>