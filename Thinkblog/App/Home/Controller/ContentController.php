<?php namespace Home\Controller; 
use Hdphp\Controller\Controller;
//内容页控制器
class ContentController extends Controller{
	// 内容页
	public function index(){
		$aid=Q('get.aid',0,'intval');
		$arcModel=new \Common\Model\Arc;
		// 刷新浏览次数+1
		$arcModel->where("aid={$aid}")->increment('click',1);
		// UPDATE article SET click=click+1 WHERE aid=$aid
		$data=$arcModel->join('article_data','aid','=','article_aid')->where("aid={$aid}")->find();
		$cateData=$arcModel->join('category','cid','=','category_cid')->where("aid={$aid}")->field('cid,cname')->find();
		// 文章和文章数据表
		$arcTagModel = new \Common\Model\ArcTag;
		$data['tag']=$arcTagModel->
		join('tag','tag_tid','=','tid')->
		where("article_aid={$aid}")->
		field('tid,tname')->get();
		$data['cname']=$cateData['cname'];
		$data['cid']=$cateData['cid'];
		View::with('data',$data);
		View::make();
	}
}