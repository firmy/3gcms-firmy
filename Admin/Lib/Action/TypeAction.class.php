<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn
	
    @function 栏目管理模块

    @Filename TypeAction.class.php $

    @Author pengyong $

    @Date 2011-11-23 10:33:18 $
*************************************************************/
class TypeAction extends CommonAction
{	
    public function index()
    {
		$type = M('type');
		$article = M('article');
		$list = $type->field("typeid,typename,ismenu,isindex,islink,isuser,drank,irank,fid,concat(path,'-',typeid) as bpath")->order('bpath,drank')->select();
		foreach($list as $k=>$v)
		{
		    $list[$k]['is_last'] = $type->where('fid='.$v['typeid'])->count();
			$list[$k]['count'] = count(explode('-',$v['bpath']));
			$list[$k]['total'] = $article->where('typeid='.$v['typeid'])->count();
			$str = '';
			if($v['fid'] <> 0)
			{
				for($i = 0;$i < $list[$k]['count'] * 2;$i++)
				{
					$str .= '&nbsp;';
				}
				$str .= '|-';
			}
			$list[$k]['space'] = $str;
		}
		$this->assign('list',$list);
		unset($type,$article,$list);
		$this->display('index');	
    }
	//字段显示控制
	function show_field(){
	$typeid = (int)$_REQUEST['typeid'];
	if($typeid ==0){$this->error('错误的分类编号');exit();}
	//字段默认显示
	$arr = array(
	array('txt'=>'标题','show'=>1),
	array('txt'=>'关键字','show'=>1),
	array('txt'=>'描述','show'=>1),
	array('txt'=>'作者','show'=>1),
	array('txt'=>'来源','show'=>1),
	array('txt'=>'浏览次数','show'=>1),
	array('txt'=>'分类','show'=>1),
	array('txt'=>'转向链接','show'=>1),
	array('txt'=>'缩略图','show'=>1),
	array('txt'=>'文章摘要','show'=>1),
	array('txt'=>'附件上传','show'=>1),
	array('txt'=>'内容','show'=>1),
	array('txt'=>'发布时间','show'=>1),
	array('txt'=>'附加选项','show'=>1),
	array('txt'=>'自动分页字数','show'=>1),
	array('txt'=>'本文显示投票','show'=>1)
	);
	$temp = M('type')->where('typeid='.$typeid)->find();
	
	if($temp){

	$myarr = explode('|',$temp['show_fields']);
	//dump($myarr);
	if(count($myarr) > 10){
	for($i=0;$i<count($myarr);$i++){
	$arr[$i]['show'] = $myarr[$i];
	}	
	}	
	}
	$this->assign('list',$arr);	
	//加载扩展字段不想用JOIN个人认为效率不高
	$list_extend = M('extend_fieldes')->order('orders')->select();
	foreach($list_extend as $k=>$v){
	$is_show = M('extend_show')->where('typeid='.$typeid.' and field_id='.$v['field_id'])->getField('is_show') == 1?1:0;
	$list_extend[$k]['is_show'] = $is_show;
	}
	$this->assign('list_extend',$list_extend);	
	$this->display();		
	}
	//模板控制
	function manage_moban(){
	$typeid = (int)$_REQUEST['typeid'];
	if($typeid ==0){$this->error('错误的分类编号');exit();}
	$temp = M('type')->where('typeid='.$typeid)->find();
	$this->assign('model_path',$temp);
	$this->display();	
	}
	
	//保存字段显示控制
	function doshow_field(){
	$typeid = (int)$_REQUEST['typeid'];
	if($typeid ==0){$this->error('错误的分类编号');exit();}    
	$str = join('|',array_slice($_POST, 1,16));
	$data = array();
	$data['typeid'] = $typeid;
	$data['show_fields'] = $str;
	$dao = M('type');
	$temp = $dao->where('typeid='.$typeid)->save($data);
	//保存扩展字段显示
	$list_extend = M('extend_fieldes')->order('orders')->select();
	foreach($list_extend as $k=>$v){
	$dao = M('extend_show')->where('typeid='.$typeid.' and field_id='.$v['field_id'])->find();
	if($dao){
	M('extend_show')->where('typeid='.$typeid.' and field_id='.$v['field_id'])->setField('is_show',intval($_POST['field_'.$v['field_id']]));
	}
	else{
	$arr['typeid'] = $typeid;
	$arr['field_id'] = $v['field_id'];
	$arr['is_show'] = intval($_POST['field_'.$v['field_id']]) ;
	$arr['orders'] = $v['orders'];
	M('extend_show')->add($arr);
	}
	}
	$this->success('保存字段显示成功');
	}
	//保存模板
	function domanage_moban(){
	$typeid = (int)$_REQUEST['typeid'];
	if($typeid ==0){$this->error('错误的分类编号');exit();}    
	$data = array();
	$data['typeid'] = $typeid;
	$data['list_path'] = $_REQUEST['list_path'];
	$data['page_path'] = $_REQUEST['page_path'];
	//dump($data);
	$dao = M('type');
	$temp = $dao->where('typeid='.$typeid)->save($data);
	$this->success('保存模板路劲成功');
	}
	
	public function add()
    {
        $type = M('type');
		$list = $type->where('islink=0')->field("typeid,typename,ismenu,isindex,islink,isuser,drank,irank,fid,concat(path,'-',typeid) as bpath")->order('bpath')->select();
		foreach($list as $key=>$value)
		{
			$list[$key]['count'] = count(explode('-',$value['bpath']));
		}
		$this->assign('list',$list);
		unset($type,$list);
		$this->display('add');
    }
	
	public function doadd()
    {
		if(empty($_POST['typename']))
		{
			alert('栏目名称不能为空!',1);
		}
		
		$type = D('type');
		
		if($type->create())
		{
			if($type->add())
			{
				alert('操作成功!',U('Type/index'));
			}
			alert('操作失败!',1);
		}
		$this->error($type->getError());
    }

	 public function edit()
    {
    	$type = M('type');
		$list = $type->where('typeid='.$_GET['typeid'])->find();
		//获取栏目option
		$olist = $type->where('islink=0')->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->order('bpath')->select();
		
		foreach($olist as $k=>$v)
		{
			$count[$k] = '';
			$ban ='';
			if($v['fid'] <> 0)
			{
				for($i = 0;$i < count(explode('-',$v['bpath'])) * 2;$i++)
				{
					$count[$k].='&nbsp;';
				}
			}
		
			if($v['typeid']==$_GET['typeid'])
			{
				$ban =" disabled='disabled'";
			}
		
			if($v['typeid'] == $list['fid'])
			{
				$option.="<option value=\"{$v['typeid']}\" selected{$ban}>{$count[$k]}|-{$v['typename']}</option>";
			}
			else
			{
				$option.="<option value=\"{$v['typeid']}\"{$ban}>{$count[$k]}|-{$v['typename']}</option>";
			}
		}

		if($list['fid'] == 0)
		{
			$option.='<option value=\"0\" selected>做为顶级分类</option>';
		}
		else
		{
			$option.='<option value=\"0\">做为顶级分类</option>';
		}
		$this->assign('option',$option);
        $this->assign('list',$list);
		unset($list,$type);
		$this->display('edit');
    }
	
//执行编辑
	public function doedit()
    {
	    if(empty($_POST['typename']))
		{
			alert('栏目名称不能为空!',1);
		}
		$type = D('type');
		$type->create();
		if($type->save())
		{
			alert('操作成功!',U('Type/index'));
		}
		alert('操作失败!',1);
    }
	
	//删除栏目&执行删除
		public function del()
    {
		$type = M('type');
		$article = M('article');
		if($type->where('fid='.$_GET['typeid'])->select())
		{
			alert('请先删除子栏目!',U('Type/index'));
		}
		if($article->where('typeid='.$_GET['typeid'])->select())
		{
			alert('请先清空栏目下文章!',U('Type/index'));
		}
		if($type->where('typeid='.$_GET['typeid'])->delete())
		{
			alert('删除成功!',U('Type/index'));
		}
    }

	public function status(){
		$a = M('type');
		$s = explode("-",$_GET['s']);
		if($s[1] == 0)
		{
			$a->where( 'typeid='.$_GET['typeid'] )-> setField($s[0],1);
		}
		elseif($s[1] == 1)
		{
			$a->where( 'typeid='.$_GET['typeid'] )-> setField($s[0],0);
		}
		else
		{
			alert('非法操作',1);
		}
		$this->redirect('index');
	}
}
?>