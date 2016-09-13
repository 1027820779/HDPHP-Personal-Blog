<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//文章管理控制器
class WebsetController extends CommonController{
	private $model;
	public function __init(){
		//调用CommonController里面的构造函数
		parent::__init();
		//实例化arc模型
	  	$this->model = new \Common\Model\Webset;
	}

	public function index(){
		if(IS_POST){
			// p(Q('post.'));exit;
			foreach(Q('post.') as $name => $value){
				$this->model->where("name='{$name}'")->save(array('value'=>$value));
			}
			// 修改配置文件 \r\n
			$data="<?php\r\nreturn ".var_export(Q('post.'),true).";\r\n?>";
			file_put_contents("Config/webset.php",$data);
			View::success("修改成功");
		}
		$data=$this->model->get();
		View::with("data",$data);
		View::make();
	}

}