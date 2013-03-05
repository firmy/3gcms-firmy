<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn
    
	@function 前台列表页 Action

    @Filename ListAction.class.php $

    @Author pengyong $

    @Date 2011-11-18 08:42:11 $
*************************************************************/
class ListAction extends BaseAction
{
	Public function _empty()
	{ 
		alert('方法不存在',__APP__);
	} 
	
	public function index()
	{
		inject_check($_GET['typeid']);
		inject_check($_GET['p']);
	//读取数据库&判断
	$typeid = (int)$_GET['typeid'];
	$list_model = 'list/list_default.html';
		$type = M('type');
		$list = $type->where('typeid='.intval($_GET['typeid']))->find();
		if(!$list)
		{
			alert('栏目不存在!',__APP__);
		}
		else
		{
		if($list['list_path'] != ''){
		$list_model = $list['list_path'];
		}
		}
		if($list['islink'] == 1)
		{
			Header('Location:'.turl($list['url']));
		}
		
	//家族树与子孙树
		parent::tree_dir($typeid,'tree_list');
		parent::children_dir($typeid,'child_list');
	//栏目基本信息封装
		$this->assign('type',$list);
	//栏目导航
		$config = F('basic','','./Web/Conf/');
		if($config['listshowmode'] == 1)
		{
			$map['fid'] = $list['fid'];
		}
		else
		{
			$map['fid'] = $_GET['typeid'];
		}
		$map['islink'] = 0;
		$nav = $type->where($map)->field('typeid,typename')->select();
		$this->assign('dh',$nav);
	//第一次释放内存
		unset($list,$nav,$map);
	//网站头部与友情链接
		R('Public','head');
		R('Public','py_link');
	//查询数据库和缓存
		$article = D('ArticleView');
	//封装条件
		$map['status'] = 1;
	//导入分页类
		import('@.ORG.Page');
	//准备工作
        $arr = get_children($typeid);
		$map['article.typeid'] = array('in',$arr);	
	//分页处理
		$count=$article->where($map)->count();
		$p = new Page($count,$config['artlistnum']);
		$p->setConfig('prev','上一页'); 
		$p->setConfig('header','篇文章');
		$p->setConfig('first','首 页');
		$p->setConfig('last','末 页');
		$p->setConfig('next','下一页');
		if(check_wap()){$temp_str = "%first%%upPage%%downPage%%end%";}
		else
		{
		$temp_str ="%first%%upPage%%linkPage%%downPage%%end%
		<select name='select' onChange='javascript:window.location.href=(this.options[this.selectedIndex].value);'>%allPage%</select>共<font color='#CD4F07'><b>%totalRow%</b></font>篇 ".$config['artlistnum']."篇/每页";
		}
		$p->setConfig('theme',$temp_str);
	//数据查询
		$alist = $article->where($map)->order('addtime desc')->limit($p->firstRow.','.$p->listRows)->select();
		//echo $article->getLastSql();
	//封装变量
		$this->assign('page',$p->show());
		$this->assign('list',$alist);
	//释放内存
		unset($article,$type,$p,$tlist,$alist);
	//模板输出
		$this->display(TMPL_PATH.cookie('think_template').'/'.$list_model);
 }
 
}