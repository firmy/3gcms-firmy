<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn

	@function article 视图模型

    @Filename ArticleViewModel.class.php $

    @Author pengyong $

    @Date 2011-11-17 15:22:07 $
*************************************************************/
class ArticleViewModel extends ViewModel
{
	public $viewFields = array( 

  'article'=>array('aid','typeid','title','addtime','istop','hits','status','isimg','isflash','ishot','_type'=>'LEFT'), 

  'type'=>array('typename', '_on'=>'article.typeid=type.typeid'), 

 ); 

}
?>