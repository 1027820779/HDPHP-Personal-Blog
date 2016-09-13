<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

// 登录控制器

class LoginController extends Controller{
	// 登录页面
	public function index(){
		if(IS_POST){
			// 1.接受数据
			// 接受用户名
			$username=Q("post.username");
			// 接受密码
			// 参数1-接受的参数，参数2-默认值，参数3-作用函数
			$password=Q("post.password","","md5");
			// 2.判断用户是否存在
			$model=new \Common\Model\User;
			// 从数据库中获得用户数据
			$data=$model->where("username='{$username}'")->find();
			if(!$data) View::error("用户名或者密码错误");
			// 3.判断密码是否正确
			if($data["password"] !=$password) View::error("用户名或者密码错误");
			// 4.登录成功
			$_SESSION["uid"]=$data["uid"];
			$_SESSION["username"]=$data["username"];
			View::success("登录成功",U('Index/index'));

		}
		// 载入模板
		View::make();
	}

	// 退出登录
	public function out(){
		session_unset();
		session_destroy();
		go(U('Login/index'));
	}
}



 ?>