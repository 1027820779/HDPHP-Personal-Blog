<?php namespace Common\Model;
use Hdphp\Model\Model;

// 文章管理模型
class Arc extends Model{

	// 指定表名
	protected $table="article";

	// 自动验证
	protected $validate=array(
		array("title","required","文章标题不能为空",3,3),
		array("category_cid","required","分类必须选择",3,3)
	);

	// 自动完成
	protected $auto=array(
		array("sendtime","time","function",3,1),
		array("updatetime","time","function",3,2),
		array("user_uid","userUid","method",3,1),
		// 缩略图
		array("thumb","thumb","method",3,3)
	);

	// 处理字段user_uid的方法，该方法返回什么，数据库就可以存入什么
	public function userUid(){
		return $_SESSION['uid'];
	}

	// 上传图,缩略图
	public function thumb(){
		// 如果有文件上传
		// p($_FILES);
		// 如果编辑的时候，只显示图片的时候，没有file类型的表单，所以不存在$_FILES['thumb']
		if(isset($_FILES['thumb']) && $_FILES['thumb']['error'] != 4){
			$files=Upload::type('jpg,png,gif')->size(2000000)->make();
			// 如果上传成功，返回对应的地址
			if($files){
				// 处理缩略图的文件名
				$newPath=str_replace('.'. $files[0]["ext"],"_thumb.".$files[0]["ext"],$files[0]['path']);
				// 缩略，返回缩略图的地址
				$thumbPath=Image::thumb($files[0]['path'],$newPath,761,"",1);
				// 存到数据库
				return $thumbPath;
			}
		}
		// 编辑的时候：如果有隐藏域$_POST['thumb']）的时候，那么就是返回旧地址
		if($thumb=Q('post.thumb')){
			return $thumb;
		}
		// 如果用户没有上传，则返回空字符串存入数据
		return '';
		// if(file_exists('./b/zuoye.php')){
		// unlink('./b/zuoye.php');
	}

	// 添加文章
	public function store(){
		// 一.触发两张表的自动验证
		// 1.验证article
		if(!$this->create()) return false;
		// 如果上传失败
		if($error=Upload::getError()){
			// 给当前模型压入错误
			$this->error=$error;
			return false;
		}

		// 2.验证article_data
		$arcDataModel=new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			// 把arcdata模型的错误，压倒当前模型
			// 因为控制器显示的错误，就是当前模型的错误
			$this->error=$arcDataModel->getError();
			return false;
		}

		// 二.添加数据
		// 1.article文章表，返回文章的自增id
		$aid=$this->add();
		// 2.article_data文章数据表
		// 给模型的打他属性压入值，那么add添加的时候就可以数据库
		$arcDataModel->data["article_aid"]=$aid;
		$arcDataModel->add();
		// 3.article_tag文章标签中间表
		$arcTagModel=new \Common\Model\ArcTag;
		foreach(Q('post.tid',array()) as $tid){
			$data=array(
				"tag_tid"=>$tid,
				"article_aid"=>$aid
			);
			$arcTagModel->add($data);
		}

		return true;
	}


	// 编辑文章
	public function edit(){
		// 一.触发两张表的自动验证
		// 1.验证article
		if(!$this->create()) return false;
		// 如果上传失败
		if($error=Upload::getError()){
			// 给当前模型压入错误
			$this->error=$error;
			return false;
		}

		// 2.验证article_data
		$arcDataModel=new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			// 把arcdata模型的错误，压倒当前模型
			// 因为控制器显示的错误，就是当前模型的错误
			$this->error=$arcDataModel->getError();
			return false;
		}

		// 二，修改
		// 1.article
		// p(Q('post.aid'));exit;
		$this->save();
		// 2.article_data
		$aid=Q('post.aid',0,'intval');
		$arcDataModel->where("article_aid=$aid")->save();
		// 3.article_tag
		// 先删除
		$arcTagModel=new \Common\Model\ArcTag;
		$arcTagModel->where("article_aid={$aid}")->delete();
		// 再添加
		foreach(Q('post.tid',array()) as $tid){
			$data=array(
				'article_aid'=>$aid,
				"tag_tid"=>$tid
			);
			$arcTagModel->add($data);
		}
		return true;

	}



}


 ?>