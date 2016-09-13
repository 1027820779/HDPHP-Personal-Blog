<?php namespace Common\Model;
use Hdphp\Model\Model;
//站点配置管理模型
class Link extends Model{
	//指定表名
    protected $table = "link";

    // 自动验证
	protected $validate=array(
		array("lname","required","名称不能为空",3,3),
		array("url","required","url地址不能为空",3,3)
	);

		// 自动完成
	protected $auto=array(
		array("addtime","time","function",3,1),
		// 缩略图
		array("logo","logo","method",3,3)
	);


		// 上传图,缩略图
	public function logo(){
		// 如果有文件上传
		// p($_FILES);
		// 如果编辑的时候，只显示图片的时候，没有file类型的表单，所以不存在$_FILES['thumb']
		if(isset($_FILES['logo']) && $_FILES['logo']['error'] != 4){
			$files=Upload::type('jpg,png,gif')->size(200000)->make();
			// 如果上传成功，返回对应的地址
			if($files){
				// p($files);exit;
				// 处理缩略图的文件名
				$newPath=str_replace('.'. $files[0]["ext"],"_thumb.".$files[0]["ext"],$files[0]['path']);
				// 缩略，返回缩略图的地址
				$thumbPath=Image::thumb($files[0]['path'],$newPath,88,31,2);
				// 存到数据库
				return $thumbPath;
			}
		}
		// 编辑的时候：如果有隐藏域$_POST['thumb']）的时候，那么就是返回旧地址
		if($thumb=Q('post.logo')){
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
		// 1.article文章表，返回文章的自增id
		$aid=$this->add();

		return true;
	}

	// 编辑文章
	public function edit(){
		// p(Q('post.'));exit;
		// 一.触发两张表的自动验证
		// 1.验证article
		if(!$this->create()) return false;
		// 如果上传失败
		if($error=Upload::getError()){
			// 给当前模型压入错误
			$this->error=$error;
			return false;
		}

		// 二，修改
		// 1.article
		// p(Q('post.aid'));exit;
		$this->save();
		return true;

	}





}