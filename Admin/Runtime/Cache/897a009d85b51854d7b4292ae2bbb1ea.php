<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站后台管理</title>
<link href="__PUBLIC__/Admin/images/Admin_css.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="__PUBLIC__/Admin/images/myfav.ico" type="image/x-icon" />
<script type="text/javascript" src="/Public/Admin/js/admin.js"></script><script type="text/javascript" src="/Public/Admin/js/Ajax.js"></script><script type="text/javascript" src="/Public/Admin/js/Jquery.js"></script> 
</head>
<body>
<table width="95%" border="0"  align=center cellpadding="3" cellspacing="2" bgcolor="#FFFFFF" class="admintable">
<tr> 
  <td colspan="5" align=left class="admintitle">模板管理</td>
</tr>
    <tr bgcolor="#f1f3f5" style="font-weight:bold;">
    <td width="30%" align="center" class="ButtonList">文件夹/文件名</td>
	<td width="20%" align="center" class="ButtonList">文件类型</td>
	<td width="10%" align="center" class="ButtonList">文件大小</td>
	<td width="20%" align="center" class="ButtonList">修改时间</td>
	<td width="20%" align="center" class="ButtonList">相关操作</td>
    </tr>
<?php if(!empty($dirlast)): ?><tr bgcolor="#f1f3f5" style="font-weight:bold;">
  <td colspan="5" align="left"><img src="__PUBLIC__/Admin/images/file/last.gif"> <a href="?s=Tpl/index/id/<?php echo ($dirlast); ?>">上级目录</a> 当前目录: <?php echo ($dirpath); ?></td>
  </tr><?php endif; ?>
<?php if(is_array($list_dir)): $i = 0; $__LIST__ = $list_dir;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php if(($vo["isDir"])  ==  "1"): ?><tr>
  	<td width="30%"><img src="__PUBLIC__/Admin/images/file/folder.gif" width="16" height="16"><a href="?s=Tpl/index/id/<?php echo ($vo["pathfile"]); ?>"> <?php echo ($vo["filename"]); ?></a></td>
    <td width="20%">文件夹</td>
    <td width="10%"><?php echo byte_format(getdirsize($vo['path'].'/'.$vo['filename']));?></td>
    <td width="20%"><?php echo (getcolordate('Y-m-d H:i:s',$vo["mtime"])); ?></td>
    <td width="20%"><a href="?s=Tpl/index/id/<?php echo ($vo["pathfile"]); ?>">下级目录</a></td>
  </tr>
  <?php else: ?>
  <tr>
  	<?php if(in_array(($vo["ext"]), explode(',',"jpg,gif,js,css,html,htm,php"))): ?><td><img src="__PUBLIC__/Admin/images/file/<?php echo ($vo["ext"]); ?>.gif" width="16" height="16"> <?php echo ($vo["filename"]); ?></td>
    <?php else: ?>
    <td><img src="__PUBLIC__/Admin/images/file/other.gif" width="16" height="16"> <?php echo ($vo["filename"]); ?></td><?php endif; ?>
    <td><?php echo (gettplname($vo["filename"])); ?></td>
    <td><?php echo (byte_format($vo["size"])); ?></td>
    <td><?php echo (getcolordate('Y-m-d H:i:s',$vo["mtime"])); ?></td>
    <?php if(ereg(".html|.htm|.txt|.css|.php|.js",$vo['filename'])){ ?>
    <td><a href="?s=Tpl/Add/id/<?php echo (wk_url_repalce($dirpath,desc)); ?>|<?php echo str_replace('.'.$vo['ext'],'*'.$vo['ext'],$vo['filename']);?>">编辑</a> <a href="?s=Tpl/Del/id/<?php echo (wk_url_repalce($dirpath,desc)); ?>|<?php echo str_replace('.'.$vo['ext'],'*'.$vo['ext'],$vo['filename']);?>" onClick="return confirm('确定删除该文件吗?')">删除</a></td>
    <?php }else{ ?>
    <td><a href="<?php echo ($dirpath); ?>/<?php echo ($vo["filename"]); ?>" target="_blank">浏览</a> <a href="?s=Tpl/Del/id/<?php echo (wk_url_repalce($dirpath,desc)); ?>|<?php echo str_replace('.'.$vo['ext'],'*'.$vo['ext'],$vo['filename']);?>" onClick="return confirm('确定删除该文件吗?')">删除</a></td>
    <?php } ?>
  </tr><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</form>
<div style="text-align:center;margin:10px;">
<hr>
<a href="http://www.3gcms.cn" target="_blank">3GCMS</a> Version <font color="red"><?php echo C("version");?></font> &copy; <?php echo date("Y");;?> 版权所有
 
</div>
</body>
</html>