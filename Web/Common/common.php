<?php
/***********************************************************
    [3gCms] (C)2011 - 2011 3gcms.cn
   
	@function 前台函数库

    @Filename common.class.php $

    @Author pengyong $

    @Date 2011-11-23 14:56:54 $
*************************************************************/
/**
+----------------------------------------------------------
* 取得label表内容
* 示例:{:label(1);}
+----------------------------------------------------------
* @access label
+----------------------------------------------------------
* @param int $id 编号
+----------------------------------------------------------
 */
	function label($id)
	{
		$label = M('label');
		$data = $label->where('id='.$id." AND status=1")->getField('content');
		if($data)
		{
			return $data;
		}
	}
 /**
+----------------------------------------------------------
* 取得article表内容:热门/置顶/推荐/图文
* 示例:{:ShowArt([0],[10],[1],[0]);} [] 代表参数可省略
+----------------------------------------------------------
* @access article
+----------------------------------------------------------
* @param int $num 开始位置[缺省为0]
* @param int $num2 结束位置[缺省为10]
* @param int $target 打开方式:0:原窗口(默认),1:新窗口
* @param int $max  0:热门(orderby hits)1:置顶(istop),2:推荐(ishot),3图文(isimg)
* @param int $typeid ：栏目ID
+--------------------------------------------------------------------
 */
	function  ShowArt($num,$num2,$target,$conditions,$typeid=0)
	{
		$article = M('article');
		$map['status'] = 1;
		if($typeid !=0)
		{
		$arr = get_tree($typeid);
		$map['typeid'] = array('in',$arr);
		}
		if(!isset($target) or $target==0)
		{
			$tar='';
		}
		else
		{
			$tar="target=\"_blank\"";
		}
		if(!isset($num))$num = 0;
		if(!isset($num2))$num = 10;
		switch($conditions)
		{
			case 0:
				$field = '*';
				$data = 'hits desc';
				break;
			case 1:
				$map['ishot'] = 1;//推荐
				$field = '*';
				$data = 'addtime desc';
				break;
			case 2:
				$map['ishot'] = 1;//推荐
				$field = '*';
				$data = 'addtime desc';
				break;
			default:
				$map['isimg'] = 1;
				$field = '*';
				$data = '';
			
		}
		$list = $article->where($map)->field($field)->order($data)->limit($num.','.$num2)->select();
		//释放内存
		unset($map,$field,$num,$num2,$article);
		if(!$list)
		{
			return '没有文章';
			exit;
		}
		$html='';
		$img='';
		foreach($list as $v)
		{
			if($conditions == 3)
			{
			$img = "<img src=\"{$v['imgurl']}\" width=\"160px\" height=\"126px\"><br>";
			}
			$url = U('articles/'.$v['aid']);
		$html.="\n<li><a href=\"{$url}\" {$tar}>{$img}{$v['title']}</a></li>";
		}
		//释放内存
		unset($list);
		return $html;
	}
	
//获取我以及子孙返回字符串10,45,478
function get_children($typeid){
$temp = array();
$temp[] = $typeid;
$dao = M('type');
$t = $dao->where('typeid ='.$typeid)->find();
if($t){
$str = $t["path"]."-".$t["typeid"];
$mylist = $dao->where("1 = instr(path,'".$str."')")->select();
foreach($mylist as $kk=>$vv){
$temp[] = $vv['typeid'];
}
}
return join(',',$temp);
}

//获取我的家族成员(单边)
function get_tree($typeid)
{
$str = '';
$dao = M('type');
$t = $dao->where('typeid ='.$typeid)->find();
if($t){
$arr = explode('-',$t["path"]);
if($arr[0] == 0){
array_shift($arr);
}
$str = join(',',$arr) ;
if($str !='')
{
$str .= ',';
}
$str .= get_children($typeid);
}
return $str;
}
//获取我的家族全部成员
function get_all_tree($typeid){
$str = '';
$dao = M('type');
$t = $dao->where('typeid ='.$typeid)->find();
if($t){
$arr = explode('-',$t["path"]);
if(count($arr) == 1){
$str = get_children($typeid);
}
else
{
$str = get_children($arr[1]);
}
}
return $str;
}
/**
+----------------------------------------------------------
* 取得Ad表内容
* 示例:{:Ad(1);}
+----------------------------------------------------------
* @access ad
+----------------------------------------------------------
* @param int $id 编号
+----------------------------------------------------------
 */
	function Ad($id)
	{
		$ad = M('ad');
		$data['id'] = $id;
		$data['status'] = 1;
		$content = $ad->where($data)->getField('content');
		unset($ad);
		return $content;
	}
/**
+----------------------------------------------------------
* 取得article表内容 通常用于栏目列表页
* 示例:{:lists(1,0,'list');} [] 代表可缺省
+----------------------------------------------------------
* @access article,type
+----------------------------------------------------------
* @param int $typeid 栏目id
* @param int $mode 查询模式
* 0:查询子栏目和本栏目 1:仅查询本栏目 2:仅查询子栏目
* @param int/string $limit 取得数据的条数
* 可以是数字:10,代表查询前10条
* 可以是字符串:"'1,10'",代表从第1条取到第10条
* @param string $param 写入模板函数名 如'list'
+----------------------------------------------------------
 */
	function lists($typeid,$mode,$limit,$param,$order='addtime desc')
	{
	//查询数据库
		$article = D('ArticleView');
		$type = M('type');
	//封装条件
		$map['status'] = 1;
	//准备工作
	//追影修改让其支持无限极
	
	/*	$data['fid'] = $typeid;
		$tlist = $type->where($data)->field('typeid')->select();
		foreach ($tlist as $v)
		{
			$arr[] = $v['typeid'] ;
		}*/
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
	//封装变量
		//$this->assign($param,$alist);
		return $alist;
	//释放内存
		unset($article,$type,$tlist,$alist);
		
	}
	//解密函数 for utf-8
	function unescape($str) 
	{ 
		$ret = ''; 
		$len = strlen($str); 
		for ($i = 0; $i < $len; $i++) 
		{ 
			if ($str[$i] == '%' && $str[$i+1] == 'u') 
			{ 
				$val = hexdec(substr($str, $i+2, 4)); 
				if ($val < 0x7f)
				{
					$ret .= chr($val); 
				}
				else if($val < 0x800)
				{
					$ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f)); 
				}
				else
				{
					$ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f)); 
				} 
				$i += 5; 
			} 
			else if ($str[$i] == '%') 
			{ 
				$ret .= urldecode(substr($str, $i, 3)); 
				$i += 2; 
			} 
			else 
			{
				$ret .= $str[$i]; 
			}
		} 
		return $ret; 
	}
	
	
	
	
	//时间比较
	function cptime($time1,$time2)
	{
		if(strtotime($time1) > strtotime($time2))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
/**
+----------------------------------------------------------
*javascript 弹窗信息
* Action示例:alert('操作失败!',1);
+----------------------------------------------------------
* @access null
+----------------------------------------------------------
* @param string $msg 弹窗信息
* @param int $url 跳转url
+----------------------------------------------------------
**/
	function alert($msg,$url)
	{
		header('Content-type: text/html; charset=utf-8');
		$str = "<script language=\"javascript\">";
		$str.="alert('{$msg}');";
		switch($url)
		{
			case 1:
				$s="window.history.go(-1);";
				break;
			case 2:
				$s="window.history.go(-2);";
				break;
			case 3:
				$s="self.close();";
				break;
			default:
			$s="location.href='{$url}';";
		}
		$str.=$s;
		$str.="</script>";
		exit($str);
	}
/**
+----------------------------------------------------------
*自定义路由url方法
* 模板示例:{$typeid|url=lists,###}
+----------------------------------------------------------
* @access null
+----------------------------------------------------------
* @param string $model 自定义路由名称
* @param int $id 路由变量,通常是:$aid,$typeid,$voteid
+----------------------------------------------------------
**/
	function url($model,$id)
	{
		return U($model.'/'.$id);
	}
	/**
+----------------------------------------------------------
*自定义模板常量路径转换
* ACTION里示例:Header('Location:'.turl($list['url']));
+----------------------------------------------------------
* @access null
+----------------------------------------------------------
* @param string $str 需转换的url;将自定义模板路径转换
+----------------------------------------------------------
**/
	function turl($str)
	{
		$article ="__ARTICLE__";
		$type ="__TYPE__";
		$web ="__WEB__";
		$revote ="__VOTE__";
		$rearticle = __ROOT__."/index.php?s=articles";
		$retype = __ROOT__."/index.php?s=lists";
		$reweb = __ROOT__."/index.php?s=";
		$revote = __ROOT__."/index.php?s=votes";
		$str = str_replace($article,$rearticle,$str);
		$str = str_replace($type,$retype,$str);
		$str = str_replace($web,$reweb,$str);
		$str = str_replace($vote,$revote,$str);
		return $str;
	}
	//防止sql注入
	function inject_check($str)
	{
		$tmp=eregi('select|insert|update|and|or|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str);
		if($tmp)
		{
		alert("非法操作!",3);
		}
		else
		{
			return $str;
		}
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
	
//获取目录下所有HTML文件
function get_files($dir){
$ret = array();
$handler = opendir($dir);
while( ($filename = readdir($handler)) !== false ) 
{     
      if(stripos($filename,'.html') !== false)
      {
      $ret[] = $filename;
      }
}
closedir($handler);
return $ret;
}
//手机端检测
function check_wap(){
	if(stristr($_SERVER['HTTP_VIA'],"wap")){// 先检查是否为wap代理，准确度高
		return true;
	}elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){// 检查浏览器是否接受 WML.
		return true;
   }elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){//检查USER_AGENT
		return true;		 	
	}else{
		return false;	
   }
}
?>