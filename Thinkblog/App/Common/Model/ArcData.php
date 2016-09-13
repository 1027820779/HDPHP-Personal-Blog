<?php namespace Common\Model;
use Hdphp\Model\Model;

// 文章数据管理模型
class ArcData extends Model{
	// 指定表名
	protected $table="article_data";
	// 自动验证
	protected $validate=array(
		array("content","required","文章内容不能为空",3,3)
	);
}


 ?>