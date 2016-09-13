<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

// 文章管理控制器
class ArcController extends CommonController{
	private $model;
	public function __init(){
		parent::__init();
		// 实例化arc模型
		$this->model=new \Common\Model\Arc;
	}


	// 展示文章
	public function index(){
		// 统计总条数
		$total=$this->model->join("category","category_cid","=","cid")->where("is_recycle=0")->count();
		// 分页类使用
		$page=Page::row(10)->make($total);
		View::with("page",$page);


		$data=$this->model->join("category","category_cid","=","cid")->limit(Page::limit())->where('is_recycle=0')->orderBy('sendtime','DESC')->get();

		View::with("data",$data);
		View::make();
	}

	// 添加文章
	public function add(){
		if(IS_POST){
			// 文章添加
			if(!$this->model->store()) View::error($this->model->getError());
			View::success("添加成功",U('index'));
		}
		// 1.处理所属分类
		$model=new \Common\Model\Cate;
		$cateData=Data::tree($model->get(),'cname');
		View::with("cateData",$cateData);

		// 2.处理文章标签
		$model=new \Common\Model\Tag;
		$tagData=$model->get();
		View::with('tagData',$tagData);

		
		View::make();
	}

	// 删除到回收站
	public function del(){
		// 就是把is_resycle改成1
		$this->model->where("aid=".Q('get.aid',0,'intval'))->save(array('is_recycle'=>1));
		View::success("删除成功",U('index'));
	}

	// 还原
	public function restart(){
		// 就是把is_resycle改成0
		$this->model->where("aid=".Q('get.aid',0,'intval'))->save(array('is_recycle'=>0));
		View::success("还原成功",U('index'));	
	}

	// 回收站
	public function recycle(){
				//统计总条数
		$total =  $this->model->join('category','category_cid','=','cid')->where("is_recycle=1")->count();
		//分页类使用
		$page = Page::row(2)->make($total);
		View::with('page',$page);
		
		//SELECT * FROM article JOIN category ON category_cid=cid;
		$data = $this->model->join('category','category_cid','=','cid')->limit(Page::limit())->where("is_recycle=1")->get();
		
		//分配数据
		View::with('data',$data);
	    View::make();
	}

	// 真正的删除
	public function realDel(){
		// article表中删除
		$aid=Q('get.aid',0,'intval');
		$imgPath=$this->model->field('thumb')->where("aid=$aid")->find();
		if(!$this->model->where("aid=$aid")->delete()){
			View::error("删除失败");
		}
		// if(file_exists($imgPath)){
		// unlink($imgPath);
		// }
		$arcData_model=new \Common\Model\ArcData;
		if(!$arcData_model->where("article_aid=$aid")->delete()){
			View::error("删除失败");
		}
		$arcTag_model=new \Common\Model\ArcTag;
		if(!$arcTag_model->where("article_aid=$aid")->delete()){
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
		// 1.处理所属分类
		$model=new \Common\Model\Cate;
		$cateData=Data::tree($model->get(),'cname');
		View::with("cateData",$cateData);

		// 2.处理文章标签
		$model=new \Common\Model\Tag;
		$tagData=$model->get();
		View::with('tagData',$tagData);

		// 3.获得旧内容
		$aid=Q('get.aid',0,'intval');
		$oldData=$this->model->join('article_data',"aid","=","article_aid")->where("aid=$aid")->find();
		View::with('oldData',$oldData);
		// 4.获得文章所选标签id
		$arcTag_model=new \Common\Model\ArcTag;
		// lists取得指定字段，并且变为一位数组
		$tids=$arcTag_model->where("article_aid=$aid")->lists("tag_tid");
		// 如果这篇文章没有标签，那么$tids为null,页面的in_array判断就会报错
		$tids=$tids?$tids:array();
		View::with('tids',$tids);


		View::make();
	}


}


 ?>