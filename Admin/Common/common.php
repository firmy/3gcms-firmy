<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn
	
	@function 后台函数库
	
    @Filename common.php $

    @Author pengyong $

    @Date 2011-11-14 08:45:20 $
*************************************************************/
//删除目录函数
	function deldir($dirname)
	{
		if(file_exists($dirname))
		{
			$dir = opendir($dirname);
			while($filename = readdir($dir))
			{
				if($filename != "." && $filename != "..")
				{
					$file = $dirname."/".$filename;
					if(is_dir($file))
					{
						deldir($file); //使用递归删除子目录	
					}
					else
					{
						@unlink($file);
					}
				}
			}
			closedir($dir);
			rmdir($dirname);
		}
	}
	//弹框信息
	function alert($msg,$url)
	{
		header('Content-type: text/html; charset=utf-8');
		$msg = str_replace("'","\\'",$msg);
		$str = '<script>';
		$str.="alert('".$msg."');";
		switch($url)
		{
			case 1:
				$s = 'window.history.go(-1);';
				break;
			case 2:
				$s = 'window.history.go(-2);';
				break;
			case 3:
				$s = 'self.close();';
				break;
			default:
				$s = "location.href='{$url}';";
		}
		$str.=$s;
		$str.='</script>';
		exit($str);
	}
/*-----文件夹与文件操作函数-----*/
//读取文件
function read_file($l1)
{
	return @file_get_contents($l1);
}
//写入文件
function write_file($l1, $l2=''){
	$dir = dirname($l1);
	if(!is_dir($dir)){
		mkdirss($dir);
	}
	return @file_put_contents($l1, $l2);
}
//递归创建文件
function mkdirss($dirs,$mode=0777) {
	if(!is_dir($dirs)){
		mkdirss(dirname($dirs), $mode);
		return @mkdir($dirs, $mode);
	}
	return true;
}
// 数组保存到文件
function arr2file($filename, $arr=''){
	if(is_array($arr)){
		$con = var_export($arr,true);
	} else{
		$con = $arr;
	}
	$con = "<?php\nreturn $con;\n?>";
	write_file($filename, $con);
}
	function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
	{
		if(function_exists("mb_substr"))
			return mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			return iconv_substr($str,$start,$length,$charset);
		}
		$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']	  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']	  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
		if($suffix) return $slice."…";
		return $slice;
	}
// 获取文件夹大小
function getdirsize($dir)
{ 
	$dirlist = opendir($dir);
	while (false !==  ($folderorfile = readdir($dirlist)))
	{ 
		if($folderorfile != "." && $folderorfile != "..")
		{ 
			if (is_dir("$dir/$folderorfile"))
			{ 
				$dirsize += getdirsize("$dir/$folderorfile"); 
			}
			else
			{ 
				$dirsize += filesize("$dir/$folderorfile"); 
			}
		}    
	}
	closedir($dirlist);
	return $dirsize;
}
	function get_client_ip()
	{
	   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		   $ip = getenv("HTTP_CLIENT_IP");
	   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		   $ip = getenv("HTTP_X_FORWARDED_FOR");
	   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		   $ip = getenv("REMOTE_ADDR");
	   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		   $ip = $_SERVER['REMOTE_ADDR'];
	   else
		   $ip = "unknown";
	   return($ip);
	}
	//替换采集等通过url参数传值
	function wk_url_repalce($xmlurl,$order='asc')
	{
	if($order=='asc')
		{
			return str_replace(array('|','@','#'),array('/','=','&'),$xmlurl);
		}
		else
		{
			return str_replace(array('/','=','&'),array('|','@','#'),$xmlurl);
		}
	}
	/**
 +----------------------------------------------------------
 * 对查询结果集进行排序
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param array $sortby 排序类型
 * asc正向排序 desc逆向排序 nat自然排序
 +----------------------------------------------------------
 * @return array
 +----------------------------------------------------------
 */
	function list_sort_by($list,$field, $sortby='asc')
	{
		if(is_array($list))
		{
			$refer = $resultSet = array();
			foreach ($list as $i => $data)
			{
				$refer[$i] = &$data[$field];
			}
			switch ($sortby) 
			{
				case 'asc': // 正向排序
					asort($refer);
					break;
				case 'desc':// 逆向排序
					arsort($refer);
					break;
				case 'nat': // 自然排序
					natcasesort($refer);
					 break;
			}
			foreach ( $refer as $key=> $val)
			{
				$resultSet[] = &$list[$key];
			}
				return $resultSet;
		}
		return false;
	}
	// 获取时间颜色:24小时内为红色
	function getcolordate($type='Y-m-d H:i:s',$time,$color='red')
	{
		if((time()-$time)>86400)
		{
			return date($type,$time);
		}
		else
		{
			return '<font color="'.$color.'">'.date($type,$time).'</font>';
		}
	}
	/**
 +----------------------------------------------------------
 * 字节格式化 把字节数格式为 B K M G T 描述的大小
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function byte_format($size, $dec=2)
{
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		 $size /= 1024;
		   $pos++;
	}
	return round($size,$dec)." ".$a[$pos];
}
//测试写入文件
function testwrite($d){
	$tfile = '_wk.txt';
	$d = ereg_replace('/$','',$d);
	$fp = @fopen($d.'/'.$tfile,'w');
	if(!$fp){
		return false;
	}else{
		fclose($fp);
		$rs = @unlink($d.'/'.$tfile);
		if($rs){
			return true;
		}else{
			return false;
		}
	}
}

//获取模板类型名称
function gettplname($filename)
{
	switch($filename)
	{
		case 'index.html':
			return '网站首页模板';
			break;
		case 'footer.html':
			return '网站底部模板';
			break;
		case 'head.html':
			return '网站头部模板';
			break;
		case 'search.html':
			return '搜索页模板';
			break;
		case 'article_article.html':
			return '文章模型文章页';
			break;
		case 'article_list.html':
			return '文章模型列表页';
			break;
		case 'guestbook.html':
			return '留言本模板';
			break;
		case 'guestbook_nopl.html':
			return '留言本空白xml';
			break;
		case 'guestbook_pl.html':
			return '留言本xml';
			break;
		case 'pl_pl.html':
			return '评论页xml';
			break;
		case 'pl_nopl.html':
			return '评论页空白xml';
			break;
		case 'guestbook_pl.html':
			return '留言本xml';
			break;
		case 'vote.html':
			return '投票页模板';
			break;
	}
	$f = explode('.',$filename);
	switch($f[1])
	{
		case 'js':
			return 'js脚本文件';
			break;
		case 'php':
			return 'php脚本文件';
			break;
		case 'css':
			return '层叠样式表';
			break;
		case 'jpg':
			return 'jpg图片';
			break;
		case 'gif':
			return 'gif图片';
			break;
		case 'png':
			return 'png图片';
			break;
		case 'zip':
			return 'zip压缩包';
			break;
		case 'rar':
			return 'rar压缩包';
			break;
		case 'html':
			return '模板文件';
			break;
		case 'htm':
			return '网页文件';
			break;
		case 'ico':
			return 'ico图标';
			break;
		case 'wmv':
			return 'wmv视频文件';
			break;
		case 'swf':
			return 'flash文件';
			break;
		case 'wma':
			return 'wma音频文件';
			break;
		case 'mp3':
			return 'mp3音频文件';
			break;
		case 'flv':
			return 'flv视频文件';
			break;
		case 'mp4':
			return 'mp4视频文件';
			break;
		default:
			return '未知文件';
			break;
	}
}
function show_field($type,$name,$value="",$option="",$css=""){
switch($type){
case 0: //单行文本
echo "<input type=\"text\" name=\"{$name}\" id=\"{$name}\" value=\"{$value}\" {$css} />";
break;
case 1: //多行文本
echo "<textarea name=\"{$name}\" {$css}>{$value}</textarea>";
break;
case 2://html编辑器
echo "<script>KindEditor.ready(function(K) {K.create(\"#{$name}\",{ afterBlur: function(){ this.sync(); }});});</script><textarea id=\"{$name}\" name=\"{$name}\" style=\"width:700px;height:300px;\" {$css}>{$value}</textarea>";
break;
case 3://单选下拉列表
if($option != '')
{
echo "<select name=\"{$name}\" {$css}>";
$arr = explode(",",$option);
for($i=0;$i<count($arr);$i++)
{
$select ='';
$temp = explode("|",$arr[$i]);
if(count($temp) == 2){
if($temp[1] == $value){
$select = 'selected="selected"';
}
echo "<option value=\"".$temp[1]."\" $select>".$temp[0]."</option>";
}
else if(count($temp) == 1){
if($temp[0] == $value){$select = 'selected="selected"';}
echo "<option value=\"".$temp[0]."\" $select>".$temp[0]."</option>";
}
}
echo "</select>";
}
break;
case 4://单选按钮
if($option != '')
{
$arr = explode(",",$option);
for($i=0;$i<count($arr);$i++)
{
$select ='';
$temp = explode("|",$arr[$i]);
if(count($temp) == 2){
if($temp[1] == $value){$select = 'checked="checked"';}
echo "<input name=\"{$name}\" type=\"radio\" value=\"".$temp[1]."\" $select {$css}/>".$temp[0]."&nbsp;";
}
else if(count($temp) == 1){
if($temp[0] == $value){$select = 'checked="checked"';}
echo "<input name=\"{$name}\" type=\"radio\" value=\"".$temp[0]."\" $select {$css}/>".$temp[0]."&nbsp;";
}
}
}
break;
case 5://多选列表
if($option != '')
{
echo "<select name=\"{$name}[]\" size=\"4\" multiple=\"multiple\" {$css}>";
$arr = explode(",",$option);
$value_arr = explode(",",$value);
for($i=0;$i<count($arr);$i++)
{
$select ='';
$temp = explode("|",$arr[$i]);
if(count($temp) == 2){
if(in_array($temp[1],$value_arr)){$select = 'selected="selected"';}
echo "<option value=\"".$temp[1]."\" $select>".$temp[0]."</option>";
}
else if(count($temp) == 1){
if(in_array($temp[0],$value_arr)){$select = 'selected="selected"';}
echo "<option value=\"".$temp[0]."\" $select>".$temp[0]."</option>";
}
}
echo "</select>";
}
break;
case 6://多选按钮checkbox
if($option != '')
{
$arr = explode(",",$option);
$value_arr = explode(",",$value);
for($i=0;$i<count($arr);$i++)
{
$select ='';
$temp = explode("|",$arr[$i]);
if(count($temp) == 2){
if(in_array($temp[1],$value_arr)){$select = 'checked="checked"';}
echo "<input name=\"{$name}[]\" type=\"checkbox\" value=\"".$temp[1]."\" $select {$css}/>".$temp[0]."&nbsp;";
}
else if(count($temp) == 1){
if(in_array($temp[0],$value_arr)){$select = 'checked="checked"';}
echo "<input name=\"{$name}[]\" type=\"checkbox\" value=\"".$temp[0]."\" $select {$css}/>".$temp[0]."&nbsp;";
}
}
}
break;
case 7://文件上传
echo "<script>KindEditor.ready(function(K){var editor = K.editor({allowFileManager : true});K(\"#insertfile_{$name}\").click(function() {					editor.loadPlugin(\"insertfile\", function() {editor.plugin.fileDialog({fileUrl : K(\"#{$name}\").val(),clickFn : function(url, title) {								K(\"#{$name}\").val(url);editor.hideDialog();}});});});});</script><input type=\"text\" id=\"{$name}\" name=\"{$name}\" value=\"{$value}\" {$css}/> <input type=\"button\" id=\"insertfile_{$name}\" value=\"选择文件\" />";
break;
}
}
//栏目的扩展字段
function list_extend_field($typeid){
$extend_field =M('extend_show')->join(C('DB_PREFIX').'extend_fieldes on '.C('DB_PREFIX').'extend_show.field_id='.C('DB_PREFIX').'extend_fieldes.field_id')->where(C('DB_PREFIX').'extend_show.is_show=1 and '.C('DB_PREFIX').'extend_show.typeid='.$typeid)->field(C('DB_PREFIX').'extend_fieldes.*')->order(C('DB_PREFIX').'extend_fieldes.orders')->select();
//echo M('extend_show')->getLastSql();
return  $extend_field;
}
?>