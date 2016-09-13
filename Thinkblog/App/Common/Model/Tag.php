<?php namespace Common\Model;
use Hdphp\Model\Model;

// 标签管理模型
class Tag extends Model{
	// 指定表名
	protected $table="tag";

	protected $validate=array(
		array("tname","required","标签名称不能为空",3,3)
	);

	// 添加方法
	public function store(){
		if(!$this->create()) return false;
		// 一次添加多个标签
		$tname=explode("|",Q('post.tname'));

		// 循环数组依次添加
		foreach($tname as $name){
			$name=trim($name);
			// 如果不为空的时候
			if($name != ""){
				// 实体化
				$name=htmlspecialchars($name);
				// 组合要添加的数组
				$data=array("tname"=>$name);
				// 执行添加
				$this->add($data);
			}
		}
		return true;
	}

	public function edit(){
		if($this->create()){
			return $this->save();
		}else{
			return false;
		}
	}



}
 ?>