<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

// 标签管理控制器

class TagController extends CommonController{
	private $model;
	public function __init(){
		// 通CommonController里面的构造方法__init(包含验证是否登录)
		parent::__init();
		$this->model=new \Common\Model\Tag;
	}

	// 标签展示
	public function index(){
		$data=$this->model->get();
		View::with("data",$data);
		View::make();
	}

	// 标签添加
	public function add(){
		if(IS_POST){
			if($this->model->store()) View::success("添加成功",U('index'));
			View::error($this->model->getError());
		}
		View::make();
	}

	// 标签删除
	public function del(){
		// 接受cid
		$tid=Q('get.tid',0,'intval');
		$this->model->where("tid=$tid")->delete();
		View::success("删除成功");

	}

	// 标签编辑
	public function edit(){
		if(IS_POST){
			if($this->model->edit()) View::success('修改成功',U('index'));
			View::error($this->model->getError());
		}
		$tid=Q('get.tid',0,'intval');
		$oldData = $this->model->where("tid={$tid}")->find();
		View::with('oldData',$oldData);
		View::make();
	}
}


 ?>