<?php namespace Home\Controller; 
use Hdphp\Controller\Controller;
//测试控制器
class IndexController extends Controller{
    //前台首页
    public function index(){
        $cateModel=new \Common\Model\Cate;
    	// 首页最新篇文章
    	$arcModel=new \Common\Model\Arc;
    	$arcData=$arcModel->join("category","category_cid","=","cid")->where("is_recycle=0")->orderBy("sendtime",'DESC')->limit(10)->get();
    	// p($arcData);exit;
    	// 实例中间表模型
    	$arcTagModel=new \Common\Model\ArcTag;
    	foreach($arcData as $k=>$v){
    		// 获得每篇文章的标签，然后压入数组，然后压入数组
    		// 中间表和标签表关联
    		$data=$arcTagModel->join("tag","tag_tid","=","tid")->where("article_aid={$v['aid']}")->field("tid,tname")->get();
    		$arcData[$k]['tag']=$data;
    	}  

    	//分类列表
		$cateData=$cateModel->get();
        // 压入文章总数
        foreach($cateData as $k=>$v){
            $cateData[$k]['total']=$arcModel->where("category_cid={$v['cid']} and is_recycle=0")->count();
        }
        View::with('cateData',$cateData);
    	View::with('arcData',$arcData);
        View::make();
    }


















    // 验证码
//     public function code(){
// //    	Code::num(C('webset.code_len'))->fontColor(C('webset.code_color'))->make();
//         Code::make();
//     }
}
