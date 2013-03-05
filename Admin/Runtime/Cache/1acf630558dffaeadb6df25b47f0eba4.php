<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站后台管理</title>
<link href="__PUBLIC__/Admin/images/Admin_css.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="__PUBLIC__/Admin/images/myfav.ico" type="image/x-icon" />
<script type="text/javascript" src="/Public/Admin/js/admin.js"></script><script type="text/javascript" src="/Public/Admin/js/Ajax.js"></script><script type="text/javascript" src="/Public/Admin/js/Jquery.js"></script> 
</head>
<body>
<table width="95%" border="0" cellspacing="2" cellpadding="3"  align=center class="admintable" style="margin-bottom:5px;">
    <tr>
      <td height="25" bgcolor="f7f7f7">快速查找：
        <SELECT onChange="javascript:window.open(this.options[this.selectedIndex].value,'main')"  size="1" name="s">
        <OPTION value="" selected>-=请选择=-</OPTION>
        <OPTION value="__URL__/index/">所有留言</OPTION>
        <OPTION value="__URL__/index/status/1">已审的留言</OPTION>
        <OPTION value="__URL__/index/status/0">未审的留言</OPTION>
      </SELECT> </td>
      <td bgcolor="f7f7f7">
	  <form name="form1" method="post" action="__URL__/search">
        <input name="keywords" type="text" id="keyword" value="" class="s26">
        <input name="Submit2" type="submit" class="bnt" value="搜索">
        </td>
     {__NOTOKEN__}
    </form>
    </tr>
</table>
<table width="95%" border="0"  align=center cellpadding="3" cellspacing="2" bgcolor="#FFFFFF" class="admintable">
<form name="myform" action="__URL__/doedit" method=post>
<tr> 
    <td colspan="5" class="admintitle">修改留言</td>
</tr>
<tr>
  <td bgcolor="#f7f7f7">留言人</td>
  <td colspan=4 bgcolor="#f7f7f7" class=td><input name="author" type="text" class="inputbg" id="author" value="<?php echo ($list["author"]); ?>" size="30"></td>
</tr>
<tr>
  <td bgcolor="#f7f7f7">留言时间</td>
  <td colspan=4 bgcolor="#f7f7f7" class=td><?php echo ($list["addtime"]); ?></td>
</tr>
<tr>
  <td bgcolor="#f7f7f7">内容</td>
  <td colspan=4 bgcolor="#f7f7f7" class=td>
  <textarea name="content" cols="80" rows="10" id="content"><?php echo ($list["content"]); ?></textarea></td>
</tr>
<tr>
  <td bgcolor="#f7f7f7">回复</td>
  <td colspan=4 bgcolor="#f7f7f7" class=td>
  <textarea name="recontent" cols="80" rows="10" id="recontent"><?php echo ($list["recontent"]); ?></textarea></td>
</tr>
<tr> 
<td width="20%"></td>
<td colspan=4 class=td><input name="id" type="hidden" value="<?php echo ($list["id"]); ?>">
<input name="submit" type="submit" class="bnt" value="提 交">  <input name="Submit22" type="button" class="bnt" onClick="history.go(-1)" value="返 回">  </td>
</tr>
</form>
</table>
<div style="text-align:center;margin:10px;">
<hr>
<a href="http://www.3gcms.cn" target="_blank">3GCMS</a> Version <font color="red"><?php echo C("version");?></font> &copy; <?php echo date("Y");;?> 版权所有
 
</div>
</body>
</html>