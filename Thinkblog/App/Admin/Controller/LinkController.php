<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//友情链接管理控制器
class LinkController extends CommonController{
	private $model;
	public function __init(){
		//调用CommonController里面的构造函数
		parent::__init();
		//实例化arc模型
	  	$this->model = new \Common\Model\Link;
	}
	// 显示页
	public function index(){
		$linkData=$this->model->orderBy('sort','ASC')->get();
		View::with('linkData',$linkData);
		View::make();
	}
	// 添加
	public function add(){
		if(IS_POST){
			// 友情链接添加
			if(!$this->model->store()) View::error($this->model->getError());
			View::success("添加成功",U('index'));
		}
		View::make();
	}

	// 删除
	public function del(){
		$lid=Q('get.lid',0,'intval');
		if(!$this->model->where("lid=$lid")->delete()){
			View::error("删除失败");
		}
		View::success("删除成功");
	}

	// 编辑
	public function edit(){
		if(IS_POST){
			// 文章添加
			if(!$this->model->edit()) View::error($this->model->getError());
			View::success("添加成功",U('index'));
		}
		//获得旧内容
		$lid=Q('get.lid',0,'intval');
		$oldData=$this->model->where("lid=$lid")->find();
		View::with('oldData',$oldData);


		View::make();
	}

}