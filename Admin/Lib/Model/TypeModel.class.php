<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn
    
	@function 栏目无限分类 Model

    @Filename TypeModel.class.php $

    @Author pengyong $

    @Date 2011-11-17 15:20:12 $
*************************************************************/
class TypeModel extends Model
{
	protected $_auto = array(
		array('path','tclm',3,'callback'),
	);
	
	function tclm()
	{
		if(!isset($_POST['fid']) or empty($_POST['fid']))
		{
			$path = 0;
		}
		else
		{
			$fid = $_POST['fid'];
			$a = $this->where('typeid='.$fid)->field('path,typeid')->find();
			if(!empty($a))
			{
				$path = $a['path'].'-'.$a['typeid'];
			}
			else
			{
				$path ='0';
			}
		}
		return $path;
	}
}
?>