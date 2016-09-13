<div class="right_content">
            <!--最火文章-->
            <?php       // 首页最新篇文章
        $arcModel=new \Common\Model\Arc;
        $arcData=$arcModel->where("is_recycle=0")->orderBy("click",'DESC')->limit(5)->get();
         ?>
			<div class="user_info">
                <li id="fil">最火文章</li>
                <?php foreach ($arcData as $v){?>
                <li class="da_line">
                    <a href="a<?php echo $v['aid']?>.html"><?php echo $v['title']?></a>
                    <span><?php echo date('Y-m-d',$v['sendtime'])?></span>
                </li>
                <?php }?>
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
                <?php foreach ($cateData as $v){?>
                <?php if($v['total']){?>
                
                <a href="con-l<?php echo $v['cid']?>.html"><?php echo $v['cname']?>(<?php echo $v['total']?>)</a>
                <?php }else{?>
				<a href=""><?php echo $v['cname']?></a>
				
               <?php }?>
                <?php }?>
            </div>
            <!--标签-->
			<?php  
			$tagDataModel=new \Common\Model\Tag;
			$tagData=$tagDataModel->get();
			?>
            <div class="tag_info">
                <li id="tag_fil">标签列表</li>
				<?php foreach ($tagData as $v){?>
                <a href="con-t<?php echo $v['tid']?>.html"><?php echo $v['tname']?></a>
                <?php }?>
            </div>
            <!--二维码-->
            <div class="img_info">
                <img src="./Public/Home/img/erweima%20.png" alt=""/>
            </div>

		</div>