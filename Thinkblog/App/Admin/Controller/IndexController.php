<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

// 后台默认控制器
class IndexController extends CommonController{

	// 构造函数，是框架自定义的
	// 不会覆盖父级的构造函数
	// 如果用construct会覆盖父级的构造函数
	public function __init(){
		parent::__init();
	}

	// 后台首页
	public function index(){
		// 载入模板
		View::make();
	}

	// 欢迎界面
	public function welcome(){
		View::make();
	}


	// 修改密码
	public function changePwd(){
		if(IS_POST){
			// 1.新密码不得少于6位，两次新密码是否相同
			$newPwd1=Q("post.newPwd1");
			$newPwd2=Q("post.newPwd2");
			// p($_POST);die;
			if(strlen($newPwd1)<6) View::error("新密码不得少于6位");
			if($newPwd1 != $newPwd2) View::error("两次密码不相同");
			// 2.判断旧密码是否正确
			$model=new \Common\Model\User;
			$data=$model->where("uid=".$_SESSION["uid"])->find();
			if($data["password"] != Q("post.oldPwd","","md5")) View::error("旧密码错误");
			// 3.更新密码
			$model->where("uid=".$_SESSION["uid"])->save(array("password"=>md5($newPwd2)));
			// 删除session,让用户重新登录
			session_unset();
			session_destroy();
			// 登录地址
			$loginUrl=U('Login/index');
			$str=<<<str
			$str = <<<str
  	<script type="text/javascript">
  		//父级窗口跳转
    		parent.location.href='{$loginUrl}';
    	</script>
str;
			echo $str;exit;
		}
		View::make();
	}
}


 ?>