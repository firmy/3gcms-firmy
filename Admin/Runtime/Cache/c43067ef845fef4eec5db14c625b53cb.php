<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站后台管理</title>
<link href="__PUBLIC__/Admin/images/Admin_css.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="__PUBLIC__/Admin/images/myfav.ico" type="image/x-icon" />
<script type="text/javascript" src="/Public/Admin/js/admin.js"></script><script type="text/javascript" src="/Public/Admin/js/Ajax.js"></script><script type="text/javascript" src="/Public/Admin/js/Jquery.js"></script> 
</head>
<body>
<script>
function showhelp(){
	var str='勾选左侧选框,点击底部操作按钮完成批量操作,左侧底部最后一个选框为全选,点击栏目切换到当前栏目所有文章,点击文章链接查看前台内容,左侧顶部可以按条件选择文章,右侧顶部可以快速查找其它栏目文章,顶部中间支持文章标题关键字搜索';
	alert(str);
}
</script>
<table width="95%" border="0" cellspacing="2" cellpadding="3"  align="center" class="admintable" style="margin-bottom:5px;">
    <tr>
      <td height="25" bgcolor="f7f7f7">快速查找：
        <SELECT onChange="javascript:window.open(this.options[this.selectedIndex].value,'main')"  size="1" name="s">
        <OPTION value="" selected>-=请选择=-</OPTION>
        <OPTION value="__URL__/index">所有文章</OPTION>
        <OPTION value="__URL__/index/status/1">已审的文章</OPTION>
        <OPTION value="__URL__/index/status/0">未审的文章</OPTION>
        <OPTION value="__URL__/index/istop/1">固顶文章</OPTION>
        <OPTION value="__URL__/index/ishot/1">推荐文章</OPTION>
		<OPTION value="__URL__/index/isflash/1">幻灯文章</OPTION>
		<OPTION value="__URL__/index/isimg/1">图片文章</OPTION>
        <OPTION value="__URL__/index/islink/1">转向链接文章</OPTION>
        <OPTION value="__URL__/index/hits/0">按浏览次数排序</OPTION>
      </SELECT>      </td>
      <td align="center" bgcolor="f7f7f7">
	  <form name="form1" method="POST" action="__URL__/search">
        <input name="keywords" type="text" id="keyword" value="" class="s26">
        <input type="submit" class="bnt" value="搜索">
		{__NOTOKEN__}
      </form></td>
      <td align="right" bgcolor="f7f7f7"></td>
    </tr>
</table>

<form name="myform" id="myform" method="POST" action="__URL__/delall">
<table width="95%" border="0"  align=center cellpadding="3" cellspacing="1" bgcolor="#F2F9E8" class="admintable">
<tr> 
<td colspan="5" align=left class="admintitle">[<a onClick="showhelp();">操作提示</a>] 选择栏目：
        <select name="ClassID" id="ClassID" onChange="javascript:window.open(this.options[this.selectedIndex].value,'main')">
    <option value="">请选择分类</option><?php echo ($op); ?></select> <?php if(($is_last)  ==  "1"): ?>[<a href="__URL__/add/typeid/<?php echo cookie('curr_typeid');?>">添加文章</a>]<?php endif; ?></td></tr>
    <tr bgcolor="#f1f3f5" style="font-weight:bold;">
    <td width="5%" height="30" align="center" class="ButtonList">&nbsp;</td>
    <td width="53%" align="center" class="ButtonList">文章名称</td>
    <td width="20%" height="25" align="center" class="ButtonList">发布时间</td>

    <td width="7%" height="25" align="center" class="ButtonList">浏览</td>
    <td width="15%" height="25" align="center" class="ButtonList">管理</td>    
    </tr>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr bgcolor="#ffffff" onMouseOver="this.style.backgroundColor='#EAFCD5';" onMouseOut="this.style.backgroundColor='';this.style.color=''">
    <td height="25" align="CENTER"><input type="checkbox" value="<?php echo ($vo["aid"]); ?>" name="aid[]" onClick="unselectall(this.form)" style="border:0;"></td>
    <td height="25">[<a href="__URL__/index/typeid/<?php echo ($vo["typeid"]); ?>"><?php echo ($vo["typename"]); ?></a>]<a href="__ROOT__/<?php echo ($urlmode); ?>articles_<?php echo ($vo["aid"]); ?><?php echo ($suffix); ?>" target="_blank"><?php echo ($vo["title"]); ?></a><?php if(($vo["ishot"])  ==  "1"): ?><font color="red">[荐]</font><?php endif; ?><?php if(($vo["istop"])  ==  "1"): ?><font color="red">[顶]</font><?php endif; ?><?php if(($vo["isimg"])  ==  "1"): ?><font color="red">[图]</font><?php endif; ?><?php if(($vo["islink"])  ==  "1"): ?><font color="red">[转]</font><?php endif; ?><?php if(($vo["isflash"])  ==  "1"): ?><font color="red">[幻]</font><?php endif; ?></td>
    <td height="25" align="center"><?php echo ($vo["addtime"]); ?></td>
    <td height="25" align="center"><?php echo ($vo["hits"]); ?></td>
    <td align="center"><a href="__URL__/status/aid/<?php echo ($vo["aid"]); ?>/status/<?php echo ($vo["status"]); ?>"><?php if(($vo["status"])  ==  "1"): ?>已审<?php else: ?><font color="red">未审</font><?php endif; ?></a>|<a href="__URL__/edit/aid/<?php echo ($vo["aid"]); ?>">编辑</a>|<a href="__URL__/del/aid/<?php echo ($vo["aid"]); ?>" onClick="JavaScript:return confirm('确定要删除？')">删除</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr><td align="center" bgcolor="f7f7f7"><input name="Action" type="hidden"  value="Del"><input name="chkAll" type="checkbox" id="chkAll" onClick=CheckAll(this.form) value="checkbox" style="border:0"></td>
  <td colspan="4" bgcolor="f7f7f7"><font color=red>移动到：</font>
    <select id="typeid" name="typeid">

      <option value="">请选择分类</option><?php echo ($op2); ?>

    </select>
    &nbsp;
<input name="Del" type="submit" class="bnt" id="Del" value="移动">
<input name="Del" type="submit" class="bnt" id="Del" value="更新时间">
<input name="Del" type="submit" class="bnt" id="Del" value="删除">
<input name="Del" type="submit" class="bnt" id="Del" value="批量未审">
<input name="Del" type="submit" class="bnt" id="Del" value="批量审核">
<input name="Del" type="submit" class="bnt" id="Del" value="推荐">
<input name="Del" type="submit" class="bnt" id="Del" value="解除推荐">
<input name="Del" type="submit" class="bnt" id="Del" value="固顶">
<input name="Del" type="submit" class="bnt" id="Del" value="解除固顶">
<input name="Del" type="submit" class="bnt" id="Del" value="幻灯">
<input name="Del" type="submit" class="bnt" id="Del" value="解除幻灯"></td>
</tr><tr><td bgcolor="f7f7f7" colspan="5">
<div id="page">
	<ul style="text-align:left;">
<?php echo ($page); ?>
    </ul>
</div>
</td></tr></table>
</form>
<div style="text-align:center;margin:10px;">
<hr>
<a href="http://www.3gcms.cn" target="_blank">3GCMS</a> Version <font color="red"><?php echo C("version");?></font> &copy; <?php echo date("Y");;?> 版权所有
 
</div>
</body>
</html>