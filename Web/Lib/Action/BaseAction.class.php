<?php


/**
  +----------------------------------------------------------
 * 项目基类
  +----------------------------------------------------------
 */
class BaseAction extends Action {
//初始化
function _initialize() {
if(check_wap()){
cookie('think_template','w3g');
}
}

protected function lists($typeid,$mode,$limit,$param,$order='addtime desc')
	{
	//查询数据库
		$article = D('ArticleView');
		$type = M('type');
	//封装条件
		$map['status'] = 1;
	//准备工作
	//追影修改让其支持无限极
		$arr = get_children($typeid);
	//模式判断
		switch($mode)
		{
			case 0:
				$map['article.typeid'] = array('in',$arr);
				break;
			case 1:
				$map['article.typeid'] = $typeid;
				break;
			case 2:
				$map['article.typeid'] = array('in',$arr);
				break;
		}
		$alist = $article->where($map)->order($order)->limit($limit)->select();
		$this->assign($param,$alist);
	}

//获取子孙目录
protected function children_dir($typeid=22,$assign = 'product_dir'){
$dao = M('type');
$t = $dao->where('typeid ='.$typeid)->find();
if($t){
$str = $t["path"]."-".$t["typeid"];
$mylist = $dao->where("1 = instr(path,'".$str."')")->select();
$this->assign($assign,$mylist);
}
}
//获取家族树
protected function tree_dir($typeid,$assign='tree_list'){
if($typeid ==0){exit();}
$str = get_all_tree($typeid);
$dao = M('type');
$t = $dao->where('typeid in('.$str.')')->order('typeid')->select();
$this->assign($assign,$t);
}



// Base end
}
?>