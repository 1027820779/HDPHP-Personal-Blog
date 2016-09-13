<?php namespace Common\Model;


use Hdphp\Model\Model;

class Cate extends Model{
	// 指定表名
	protected $table="category";
	// 自动验证
	protected $validate=array(
		// array(字段名，验证方法，错误信息，验证条件，验证时间)
		array("cname","required","分类名称不能为空",3,3),
		array("cname",'maxlen:20',"分类名称不得超过20个字符",3,3),
		array("csort","num:0,65535","排序为0-65535范围",3,3)
	);

	// 自定义的store方法
	public function store(){
		// 调用框架的create方法，触发自动验证
		if($this->create()){
			// 调用框架的添加方法，返回自增主键id
			// 返回真
			return $this->add();
		}else{
			// 返回假
			return false;
		}
	}

//    模型 编辑方法
    public function edit(){
    	// 执行自动验证
        if($this->create()){
        	// 使用save方法不指定where条件，$_post里面的必须有主键id
        	// 如果用$_post里面没有主键，那就自己指定where条件
            $this->save();
            return true;
        }
        return false;  
    }

    // 获得除了自己和自己的子集，被分类控制器编辑方法所调用
    public function getNoMy($cid){
    	// 获得当前分类的子集的cid
    	$cids=$this->getSon($this->get(),$cid);
        // 把自己的cid压入
        $cids[]=$cid;
        // 获得除了自己和自己的子集的数据
        $data=$this->where("cid NOT IN(".implode(',', $cids).")")->get();
        // $log=$this->getQueryLog();
        // p($log);
        // p($data);
        $data=Data::tree($data,'cname');
        return $data;
    }

    // 获得所有的子集cid
    public function getSon($data,$cid){
    	$temp=array();
    	foreach ($data as $v){
    		if($v['pid']==$cid){
    			// 把自己的cid压入到temp临时数组
    			$temp[]=$v['cid'];
    			$temp=array_merge($temp,$this->getSon($data,$v['cid']));
    		}
    	}
    	return $temp;
    }


































}

 ?>