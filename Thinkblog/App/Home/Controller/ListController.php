<?php namespace Home\Controller; 
use Hdphp\Controller\Controller;
//列表页控制器
class ListController extends Controller{
	//列表页
	public function index(){
		// 处理标签名称
		$tid=Q('get.tid',0,'intval');
		if($tid){
			$tagModel=new \Common\Model\Tag;
			$name=$tagModel->where("tid={$tid}")->pluck('tname');
			// 统计文章总数
			$arcTagModel=new \Common\Model\ArcTag;
			$total=$arcTagModel->join("article",'article_aid','=',"aid")->where("tag_tid=$tid  AND is_recycle=0")->count();
			// 根据tid筛选出来文章
			$arcModel=new \Common\Model\Arc;
			$arcData=$arcModel->join("article_tag","article_aid","=","aid")->join('category','category_cid','=','cid')->orderBy("sendtime",'DESC')->where("tag_tid=$tid AND is_recycle=0")->get();
			// 标签
				foreach ($arcData as $k => $v) {
				//获得每篇文章的标签，然后压入数组
				//中间表和标签表关联
					$data = $arcTagModel->join('tag','tag_tid','=','tid')->where("article_aid={$v['aid']}")->field('tid,tname')->get();
					$arcData[$k]['tag'] = $data;
				}	
		}
		// 处理分类名称
		$cid=Q('get.cid',0,'intval');
		if($cid){
			$cateModel=new \Common\Model\Cate;
			$name=$cateModel->where("cid={$cid}")->pluck('cname');
			// 统计该分类
			$cids=$cateModel->getson($cateModel->get(),$cid);
			$cids[]=$cid;
			$arcModel=new \Common\Model\Arc;
			$total=$arcModel->where("category_cid in(".implode(",",$cids).") and is_recycle=0")->count();
			//根据顶级分类，以及下面所有的子分类筛选出来文章")->count();
			// 根据cid筛选出来文章
    		$arcData=$arcModel->join("category","category_cid","=","cid")->orderBy("sendtime",'DESC')->where("category_cid in (".implode(',',$cids).") and is_recycle=0")->get();
    		// p($arcData);
			// 标签
    		$arcTagModel = new \Common\Model\ArcTag;
			foreach ($arcData as $k => $v) {
			//获得每篇文章的标签，然后压入数组
			//中间表和标签表关联
				$data=$arcTagModel
				->join('tag','tag_tid','=','tid')
				->where("article_aid={$v['aid']}")->field('tid,tname')->get();
				$arcData[$k]['tag'] = $data;
			} 	

		}
		// echo $name."<br/>".$total;
		// 名称
		View::with('name',$name);

		//共有多少篇文章
		View::with('total',$total);
		// p($total);
		// 文章
		View::with("arcData",$arcData);
		View::make();
	}

}