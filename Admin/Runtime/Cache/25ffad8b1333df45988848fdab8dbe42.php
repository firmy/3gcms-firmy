<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站后台管理</title>
<link href="__PUBLIC__/Admin/images/Admin_css.css" type="text/css" rel="stylesheet">
<style> 
td {font-size:13px;}
</style>
<link rel="shortcut icon" href="__PUBLIC__/Admin/images/myfav.ico" type="image/x-icon" />
<script src="__PUBLIC__/Admin/js/admin.js"></script>
</head>
<body>
<form name='frm' method='post' action='__URL__/update'>
<div class="nTableft admintable">
      	<div class="TabTitleleft">
      		<ul id="myTab1">
					<li class="active" onClick="nTabs(this,0);">网站整体配置</li>
        			<li class="normal" onClick="nTabs(this,1);">首页配置</li>
					<li class="normal" onClick="nTabs(this,2);">列表页配置</li>
                    <li class="normal" onClick="nTabs(this,3);">内容页配置</li>
      		</ul>
    	</div>
        
		<div id="myTab1_Content0"  style="clear:both;">
<table width="100%" border="0"  align=center cellpadding="3" cellspacing="1" style="margin:5px 0;background:#FFF">
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">网站名称：sitetitle
				<div id='hSiteTitle' style="color:#ccc;letter-spacing: 0px;font-size:12px;">你网站的名字</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="sitetitle" type="text" id="oSiteTitle" onFocus="hSiteTitle.style.color='blue';" onBlur="hSiteTitle.style.color='#ccc';" value="<?php echo ($list["sitetitle"]); ?>" style="width:300px;">
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页副标题：sitetitle2
				<div id='hSiteTitle2' style="color:#ccc;letter-spacing: 0px;font-size:12px;">即显示在首页标题后面的文字,可适合填写一些网站关键字,利于搜索引擎收录</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="sitetitle2" type="text" id="oSiteTitle2" onFocus="hSiteTitle2.style.color='blue';" onBlur="hSiteTitle2.style.color='#ccc';" value="<?php echo ($list["sitetitle2"]); ?>" style="width:300px;">
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">网站域名：siteurl
				<div id='hSiteUrl' style="color:#ccc;letter-spacing: 0px;font-size:12px;">当前网站域名:前台底部显示&前台顶部设为首页</div>
		  	</td>
			<td width="60%" align="left">
				<input name="siteurl" type="text" id="oSiteUrl"  onFocus="hSiteUrl.style.color='blue';" onBlur="hSiteUrl.style.color='#ccc';" value="<?php echo ($list["siteurl"]); ?>" style="width:300px;">
		  </td>
	  </tr>
	  		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">默认模板：sitetpl
				<div id='hsitetpl' style="color:#ccc;letter-spacing: 0px;font-size:12px;">当前网站前台默认模板目录</div>
		  	</td>
			<td width="60%" align="left">
				<input name="sitetpl" type="text" id="ositetpl"  onFocus="hsitetpl.style.color='blue';" onBlur="hsitetpl.style.color='#ccc';" value="<?php echo ($list["sitetpl"]); ?>" style="width:300px;">
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">Logo图片：sitelogo
				<div id='hSiteLogo' style="color:#ccc;letter-spacing: 0px;font-size:12px;">左上角网站标志图</div>
		  	</td>
			<td width="60%" align="left">
				
                <input name="sitelogo" type="text" id="oSiteLogo" onFocus="hSiteLogo.style.color='blue';" onBlur="hSiteLogo.style.color='#ccc';" value="<?php echo ($list["sitelogo"]); ?>" style="width:300px;"><a href="__APP__/Clear">LOGO附件清理</a><br><iframe src="__APP__/File/logo" width="400" height="25" frameborder="0" scrolling="no"></iframe>
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">关 键 字：sitekeywords
				<div id='hSiteKeywords' style="color:#ccc;letter-spacing: 0px;font-size:12px;">网站针对搜索引擎的关键字，以半角逗号分隔</div>
		  	</td>
			<td width="60%" align="left">
				
<textarea class='css_textarea' name="sitekeywords" type="text" id="oSiteKeywords" onFocus="hSiteKeywords.style.color='blue';" onBlur="hSiteKeywords.style.color='#ccc';" cols="50" rows="5" ><?php echo ($list["sitekeywords"]); ?></textarea>      
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">网站描述：sitedescription
				<div id='hSitedescription' style="color:#ccc;letter-spacing: 0px;font-size:12px;">网站的描述</div>
		  	</td>
			<td width="60%" align="left">
				
<textarea class='css_textarea' name="sitedescription" type="text" id="oSitedescription" onFocus="hSitedescription.style.color='blue';" onBlur="hSitedescription.style.color='#ccc';" cols="50" rows="5" ><?php echo ($list["sitedescription"]); ?></textarea>      
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">底部联系方式：sitelx
				<div id='hSitelx' style="color:#ccc;letter-spacing: 0px;font-size:12px;">支持html</div>
		  	</td>
			<td width="60%" align="left">
				
<textarea class='css_textarea' name="sitelx" type="text" id="oSitelx" onFocus="hSitelx.style.color='blue';" onBlur="hSitelx.style.color='#ccc';" cols="50" rows="5" ><?php echo ($list["sitelx"]); ?></textarea>      
				
		  </td>
	  </tr>
	

	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">备案序号：sitetcp
				<div id='hSiteTcp' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="sitetcp" type="text" id="oSiteTcp" onFocus="hSiteTcp.style.color='blue';" onBlur="hSiteTcp.style.color='#ccc';" value="<?php echo ($list["sitetcp"]); ?>" style="width:300px;">
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">留言是否需要审核：bookoff
				<div id='hbookoff' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="bookoff" type="text" id="obookoff" onFocus="hbookoff.style.color='blue';" onBlur="hbookoff.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["bookoff"])  ==  "1"): ?>selected<?php endif; ?>>不审核</option><option value="0" <?php if(($list["bookoff"])  ==  "0"): ?>selected<?php endif; ?>>审核</option>
				</select>
				
		  </td>
	  </tr>
	  
	   <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">评论是否需要审核：pingoff
				<div id='hpingoff' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="pingoff" type="text" id="opingoff" onFocus="hpingoff.style.color='blue';" onBlur="hpingoff.style.color='#ccc';" style="width:150px;">
					<option value="0" <?php if(($list["pingoff"])  ==  "0"): ?>selected<?php endif; ?>>审核</option><option value="1" <?php if(($list["pingoff"])  ==  "1"): ?>selected<?php endif; ?>>不审核</option>
				</select>
				
		  </td>
	  </tr>
	  
	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">发表文章，评论等时间间隔(秒)：postovertime 
				<div id='hpostovertime' style="color:#ccc;letter-spacing: 0px;font-size:12px;">评论等时间间隔(秒)</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="postovertime" type="text" id="opostovertime" onFocus="hpostovertime.style.color='blue';" onBlur="hpostovertime.style.color='#ccc';" value="<?php echo ($list["postovertime"]); ?>" style="width:30px;">	
		  </td>
	  </tr>


	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">网站语言：sitelang
				<div id='hsitelang' style="color:#ccc;letter-spacing: 0px;font-size:12px;">默认以哪种语言显示</div>
		  	</td>
			<td width="60%" align="left">
				
<select class='css_select' name="sitelang" type="text" id="ositelang" onFocus="hsitelang.style.color='blue';" onBlur="hsitelang.style.color='#ccc';" style="width:150px;">
		<option value="0" <?php if(($list["sitelang"])  ==  "0"): ?>selected<?php endif; ?>>简体中文</option><option value="1" <?php if(($list["sitelang"])  ==  "1"): ?>selected<?php endif; ?>>繁體中文</option>
				</select>
			</td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">水印开关：watermark
				<div id='hwatermark' style="color:#ccc;letter-spacing: 0px;font-size:12px;">网站图片附件开启水印</div>
		  	</td>
			<td width="60%" align="left">
				
            <select class='css_select' name="watermark" type="text" id="owatermark" onFocus="hwatermark.style.color='blue';" onBlur="hwatermark.style.color='#ccc';" style="width:150px;">
					<option value="0" <?php if(($list["watermark"])  ==  "0"): ?>selected<?php endif; ?>>关闭</option><option value="1" <?php if(($list["watermark"])  ==  "1"): ?>selected<?php endif; ?>>开启</option>
				</select>
		  </td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">水印图片：watermarkimg
				<div id='hwatermarkimg' style="color:#ccc;letter-spacing: 0px;font-size:12px;">仅支持gif/png/jpeg格式</div>
		  	</td>
			<td width="60%" align="left">
				
           <input name="watermarkimg" type="text" id="owatermarkimg" onFocus="hwatermarkimg.style.color='blue';" onBlur="hwatermarkimg.style.color='#ccc';" value="<?php echo ($list["watermarkimg"]); ?>" style="width:300px;"><br><iframe src="__APP__/File/watermark" width="400" height="25" frameborder="0" scrolling="no"></iframe>
		  </td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">伪静态设置：urlmode
				<div id='hurlmode' style="color:#ccc;letter-spacing: 0px;font-size:12px;">'隐藏:index.php':需服务器支持.htaccess</div>
		  	</td>
			<td width="60%" align="left">
				
<select class='css_select' name="urlmode" type="text" id="ourlmode" onFocus="hurlmode.style.color='blue';" onBlur="hurlmode.style.color='#ccc';" style="width:150px;">
		<option value="0" <?php if(($list["urlmode"])  ==  "0"): ?>selected<?php endif; ?>>显示'index.php'</option><option value="1" <?php if(($list["urlmode"])  ==  "1"): ?>selected<?php endif; ?>>隐藏'index.php'</option><option value="2" <?php if(($list["urlmode"])  ==  "2"): ?>selected<?php endif; ?>>兼容模式'?s='</option>
				</select>
			</td>
	  </tr>
	  
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">伪静态后缀：suffix
				<div id='hsuffix' style="color:#ccc;letter-spacing: 0px;font-size:12px;">伪静态网页后缀</div>
		  	</td>
			<td width="60%" align="left">
				<select class='css_select' name="suffix" type="text" id="osuffix" onFocus="hsuffix.style.color='blue';" onBlur="hsuffix.style.color='#ccc';" style="width:150px;">
			<option value="0" <?php if(($list["suffix"])  ==  "0"): ?>selected<?php endif; ?>>.html</option>
			<option value="1" <?php if(($list["suffix"])  ==  "1"): ?>selected<?php endif; ?>>.htm</option>
			<option value="2" <?php if(($list["suffix"])  ==  "2"): ?>selected<?php endif; ?>>.shtml</option>
			<option value="3" <?php if(($list["suffix"])  ==  "3"): ?>selected<?php endif; ?>>.php</option>
			<option value="4" <?php if(($list["suffix"])  ==  "4"): ?>selected<?php endif; ?>>.asp</option>
			<option value="5" <?php if(($list["suffix"])  ==  "5"): ?>selected<?php endif; ?>>.aspx</option>
			<option value="6" <?php if(($list["suffix"])  ==  "6"): ?>selected<?php endif; ?>>.jsp</option>
				</select>
			</td>
	  </tr>
	
	
		<tr class=css_page_list>
			<td height="30" colspan=2 align="center">
		  <input name='Submit' type='submit' class="bnt" value=' 修 改 '></td>
		</tr>
</table>
   		</div>
        
		<div id="myTab1_Content1" class='none' style="clear:both;">
<table width="100%" border="0"  align=center cellpadding="3" cellspacing="1" style="margin:5px 0;background:#FFF">
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">幻灯显示图片数量：ishomeimg
				<div id='hIsHomeimg' style="color:#ccc;letter-spacing: 0px;font-size:12px;">首页幻灯显示条数,填0则启用首页幻灯位广告</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="ishomeimg" type="text" id="oIsHomeimg" onFocus="hIsHomeimg.style.color='blue';" onBlur="hIsHomeimg.style.color='#ccc';" value="<?php echo ($list["ishomeimg"]); ?>" style="width:30px;">
				
		  </td>
	  </tr>
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页推荐文章数量：indexrec
				<div id='hindexrec' style="color:#ccc;letter-spacing: 0px;font-size:12px;">0则不显示</div>
		  	</td>
			<td width="60%" align="left">
				<input name="indexrec" type="text" id="oindexrec" onFocus="hindexrec.style.color='blue';" onBlur="hindexrec.style.color='#ccc';" value="<?php echo ($list["indexrec"]); ?>" style="width:30px;">
		推荐栏目标题:<input name="indexrectitle" value="<?php echo ($list["indexrectitle"]); ?>">
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页排行文章数量：indexhot
				<div id='hindexhot' style="color:#ccc;letter-spacing: 0px;font-size:12px;">0则不显示</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="indexhot" type="text" id="oindexhot" onFocus="hindexhot.style.color='blue';" onBlur="hindexhot.style.color='#ccc';" value="<?php echo ($list["indexhot"]); ?>" style="width:30px;">
		排行栏目标题:<input name="indexhottitle" value="<?php echo ($list["indexhottitle"]); ?>">
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页显示的投票ID：indexvote
				<div id='hindexvote' style="color:#ccc;letter-spacing: 0px;font-size:12px;">首页右下角显示的投票ID,0为不显示</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="indexvote" type="text" id="oindexvote" onFocus="hindexvote.style.color='blue';" onBlur="hindexvote.style.color='#ccc';" value="<?php echo ($list["indexvote"]); ?>" style="width:30px;">
			投票栏目标题:<input name="indexvotetitle" value="<?php echo ($list["indexvotetitle"]); ?>">
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">公告栏目ID：noticeid
				<div id='hnoticid' style="color:#ccc;letter-spacing: 0px;font-size:12px;">首页显示的最新公告栏目ID,在栏目管理里面查看</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="noticeid" type="text" id="onoticid" onFocus="hnoticid.style.color='blue';" onBlur="hnoticid.style.color='#ccc';" value="<?php echo ($list["noticeid"]); ?>" style="width:30px;">
			公告栏目标题:<input name="indexnoticetitle" value="<?php echo ($list["indexnoticetitle"]); ?>">
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">公告显示数量：noticenum
				<div id='hNoticNum' style="color:#ccc;letter-spacing: 0px;font-size:12px;">首页网站公告条数,填0则隐藏网站公告</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="noticenum" type="text" id="oNoticNum" onFocus="hNoticNum.style.color='blue';" onBlur="hNoticNum.style.color='#ccc';" value="<?php echo ($list["noticenum"]); ?>" style="width:30px;">
				
		  </td>
	  </tr>
	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">迷你滚动公告数量：rollnum
				<div id='hrollnum' style="color:#ccc;letter-spacing: 0px;font-size:12px;">迷你滚动公告条数,填0则隐藏</div>
		  	</td>
			<td width="60%" align="left">
				<input name="rollnum" type="text" id="orollnum" onFocus="hrollnum.style.color='blue';" onBlur="hrollnum.style.color='#ccc';" value="<?php echo ($list["rollnum"]); ?>" style="width:30px;">
		  </td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页是否显示友情链接：indexlink
				<div id='hindexlink' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				<select class='css_select' name="indexlink" type="text" id="oindexlink" onFocus="hindexlink.style.color='blue';" onBlur="hindexlink.style.color='#ccc';" style="width:50px;">
					<option value="1" <?php if(($list["indexlink"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["indexlink"])  ==  "0"): ?>selected<?php endif; ?>>隐藏</option>
				</select>
		友情链接标题:<input name="indexlinktitle" value="<?php echo ($list["indexlinktitle"]); ?>">
		图片链接:<select class='css_select' name="indexlinkimg" type="text" id="oindexlinkimg" onFocus="hindexlinkimg.style.color='blue';" onBlur="hindexlinkimg.style.color='#ccc';" style="width:50px;">
					<option value="1" <?php if(($list["indexlinkimg"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["indexlinkimg"])  ==  "0"): ?>selected<?php endif; ?>>隐藏</option>
				</select>
		链接申请:<select class='css_select' name="indexdiylink" type="text" id="oindexdiylink" onFocus="hindexdiylink.style.color='blue';" onBlur="hindexdiylink.style.color='#ccc';" style="width:50px;">
					<option value="1" <?php if(($list["indexdiylink"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["indexdiylink"])  ==  "0"): ?>selected<?php endif; ?>>隐藏</option>
				</select>
		  </td>
	  </tr>

	  	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页是否显示最新图文：indexpic
				<div id='hindexpic' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				<select class='css_select' name="indexpic" type="text" id="oindexpic" onFocus="hindexpic.style.color='blue';" onBlur="hindexpic.style.color='#ccc';" style="width:50px;">
					<option value="1" <?php if(($list["indexpic"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["indexpic"])  ==  "0"): ?>selected<?php endif; ?>>隐藏</option>
				</select>
		最新图文标题:<input name="indexpictitle" value="<?php echo ($list["indexpictitle"]); ?>">
		<select class='css_select' name="indexpicscroll" type="text" id="oindexpic" onFocus="hindexpic.style.color='blue';" onBlur="hindexpic.style.color='#ccc';" style="width:50px;">
					<option value="1" <?php if(($list["indexpicscroll"])  ==  "1"): ?>selected<?php endif; ?> >滚动</option><option value="0" <?php if(($list["indexpicscroll"])  ==  "0"): ?>selected<?php endif; ?>>静止</option>
				</select>
				条数:<input name="indexpicnum" value="<?php echo ($list["indexpicnum"]); ?>" style="width:30px;">
		  </td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">首页幻灯片模式选择：flashmode
				<div id='hflashmode' style="color:#ccc;letter-spacing: 0px;font-size:12px;">手动幻灯下幻灯管理有效,文章模式下对含幻灯属性文章幻灯</div>
		  	</td>
			<td width="60%" align="left">
				<select class='css_select' name="flashmode" type="text" id="oflashmode" onFocus="hflashmode.style.color='blue';" onBlur="hflashmode.style.color='#ccc';" style="width:100px;">
					<option value="1" <?php if(($list["flashmode"])  ==  "1"): ?>selected<?php endif; ?> >文章幻灯模式</option><option value="0" <?php if(($list["flashmode"])  ==  "0"): ?>selected<?php endif; ?>>手动幻灯模式</option>
				</select>
		  </td>
	  </tr>
		<tr class=css_page_list>
			<td height="30" colspan=2 align="center">
		  <input name='submit' type='submit' class="bnt" value=' 修 改 '></td>
		</tr>
</table>
   		</div>
		<div id="myTab1_Content2" class='none' style="clear:both;">
<table width="100%" border="0"  align=center cellpadding="3" cellspacing="1" style="margin:5px 0;background:#FFF">
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">列表页每页显示记录：artlistnum
				<div id='hartlistnum' style="color:#ccc;letter-spacing: 0px;font-size:12px;">文章分类列表每页显示记录数</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="artlistnum" type="text" id="oartlistnum" onFocus="hartlistnum.style.color='blue';" onBlur="hartlistnum.style.color='#ccc';" value="<?php echo ($list["artlistnum"]); ?>" style="width:30px;">
				
		  </td>
	  </tr>

	<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">列表分类导航：listshowmode
				<div id='hlistshowmode' style="color:#ccc;letter-spacing: 0px;font-size:12px;">列表页右侧分类导航调用</div>
		  	</td>
			<td width="60%" align="left">
				<select class='css_select' name="listshowmode" type="text" id="olistshowmode" onFocus="hlistshowmode.style.color='blue';" onBlur="hlistshowmode.style.color='#ccc';" style="width:100px;">
					<option value="1" <?php if(($list["listshowmode"])  ==  "1"): ?>selected<?php endif; ?> >同级栏目</option><option value="0" <?php if(($list["listshowmode"])  ==  "0"): ?>selected<?php endif; ?>>子级栏目</option>
				</select>
		  </td>
	  </tr>

	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">列表页推荐文章数：artlistrec
				<div id='hartlistrec' style="color:#ccc;letter-spacing: 0px;font-size:12px;">列表页推荐文章数目,填0代表不启用推荐文章</div>
		  	</td>
			<td width="60%" align="left">
				<input name="artlistrec" type="text" id="oartlistrec" onFocus="hartlistrec.style.color='blue';" onBlur="hartlistrec.style.color='#ccc';" value="<?php echo ($list["artlistrec"]); ?>" style="width:30px;">
			推荐栏目标题:<input name="listrectitle" value="<?php echo ($list["listrectitle"]); ?>">
		  </td>
	  </tr>
	   <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">列表页热门文章数：artlisthot
				<div id='hartlisthot' style="color:#ccc;letter-spacing: 0px;font-size:12px;">列表页热门文章数目,填0代表不启用热门文章</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="artlisthot" type="text" id="oartlisthot" onFocus="hartlisthot.style.color='blue';" onBlur="hartlisthot.style.color='#ccc';" value="<?php echo ($list["artlisthot"]); ?>" style="width:30px;">
			热门栏目标题:<input name="listhottitle" value="<?php echo ($list["listhottitle"]); ?>">	
		  </td>
	  </tr>
		<tr class=css_page_list>
			<td height="30" colspan=2 align="center">
			<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>"/>
		  <input name='submit' type='submit' class="bnt" value=' 修 改 '></td>
		</tr>
</table>
   		</div>
        
		<div id="myTab1_Content3" class='none' style="clear:both;">
<table width="100%" border="0"  align=center cellpadding="3" cellspacing="1" style="margin:5px 0;background:#FFF">
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页推荐文章数：articlerec
				<div id='harticlerec' style="color:#ccc;letter-spacing: 0px;font-size:12px;">内容页推荐文章数,填0则不显示</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="articlerec" type="text" id="oarticlerec" onFocus="harticlerec.style.color='blue';" onBlur="harticlerec.style.color='#ccc';" value="<?php echo ($list["articlerec"]); ?>" style="width:30px;">
			推荐栏目标题:<input name="artrectitle" value="<?php echo ($list["artrectitle"]); ?>">
		  </td>
	  </tr>
	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页热门文章数：articlehot
				<div id='harticlehot' style="color:#ccc;letter-spacing: 0px;font-size:12px;">内容页热门文章数,填0则不显示</div>
		  	</td>
			<td width="60%" align="left">
				
				<input name="articlehot" type="text" id="oarticlehot" onFocus="harticlehot.style.color='blue';" onBlur="harticlehot.style.color='#ccc';" value="<?php echo ($list["articlehot"]); ?>" style="width:30px;">
			热门栏目标题:<input name="arthottitle" value="<?php echo ($list["arthottitle"]); ?>">
		  </td>
	  </tr>
<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示评论：isping
				<div id='hisping' style="color:#ccc;letter-spacing: 0px;font-size:12px;">内容页是否显示评论</div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="isping" type="text" id="oisping" onFocus="hisping.style.color='blue';" onBlur="hisping.style.color='#ccc';" style="width:150px;">
					<option value="0" <?php if(($list["isping"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option><option value="1" <?php if(($list["isping"])  ==  "1"): ?>selected<?php endif; ?>>显示</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示摘要：iszy
				<div id='hIszhaiyao' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="iszy" type="text" id="oIszhaiyao" onFocus="hIszhaiyao.style.color='blue';" onBlur="hIszhaiyao.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["iszy"])  ==  "1"): ?>selected<?php endif; ?>>显示</option><option value="0" <?php if(($list["iszy"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示点击数：ishits
				<div id='hIsHits' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="ishits" type="text" id="oIsHits" onFocus="hIsHits.style.color='blue';" onBlur="hIsHits.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["ishits"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["ishits"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option>
				</select>
				
		  </td>
	  </tr>
	
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示来源：iscopyfrom
				<div id='hIsFrom' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="iscopyfrom" type="text" id="oIsFrom" onFocus="hIsFrom.style.color='blue';" onBlur="hIsFrom.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["iscopyfrom"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["iscopyfrom"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示心情投票：mood
				<div id='hmood' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="mood" type="text" id="omood" onFocus="hmood.style.color='blue';" onBlur="hmood.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["mood"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["mood"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否显示作者：isauthor
				<div id='hIsAuthor' style="color:#ccc;letter-spacing: 0px;font-size:12px;"></div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="isauthor" type="text" id="oIsAuthor" onFocus="hIsAuthor.style.color='blue';" onBlur="hIsAuthor.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["isauthor"])  ==  "1"): ?>selected<?php endif; ?> >显示</option><option value="0" <?php if(($list["isauthor"])  ==  "0"): ?>selected<?php endif; ?>>不显示</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页是否启用鼠标缩放：mouseimg
				<div id='hmouserimg' style="color:#ccc;letter-spacing: 0px;font-size:12px;">启用该功能后，文章中的图片会随着鼠标滚轮放大和缩小</div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="mouseimg" type="text" id="omouserimg" onFocus="hmouserimg.style.color='blue';" onBlur="hmouserimg.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["mouseimg"])  ==  "1"): ?>selected<?php endif; ?>>启用</option><option value="0" <?php if(($list["mouseimg"])  ==  "0"): ?>selected<?php endif; ?> >不启用</option>
				</select>
				
		  </td>
	  </tr>
	
		<tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页上下篇：updown
				<div id='hupdown' style="color:#ccc;letter-spacing: 0px;font-size:12px;">内容页是否上一篇下一篇</div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="updown" type="text" id="oupdown" onFocus="hupdown.style.color='blue';" onBlur="hupdown.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["updown"])  ==  "1"): ?>selected<?php endif; ?> >启用</option><option value="0" <?php if(($list["updown"])  ==  "0"): ?>selected<?php endif; ?>>不启用</option>
				</select>
				
		  </td>
	  </tr>
	  <tr onMouseOver="this.style.backgroundColor='#EEFCDD';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''">
			<td width="40%" align="left">内容页相关文章：xgwz
				<div id='hxgwz' style="color:#ccc;letter-spacing: 0px;font-size:12px;">内容页是否显示相关文章</div>
		  	</td>
			<td width="60%" align="left">
				
				<select class='css_select' name="xgwz" type="text" id="oxgwz" onFocus="hxgwz.style.color='blue';" onBlur="hxgwz.style.color='#ccc';" style="width:150px;">
					<option value="1" <?php if(($list["xgwz"])  ==  "1"): ?>selected<?php endif; ?> >启用</option><option value="0" <?php if(($list["xgwz"])  ==  "0"): ?>selected<?php endif; ?>>不启用</option>
				</select>
				
		  </td>
	  </tr>
		<tr class="css_page_list">
			<td height="30" colspan=2 align="center">
			<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>"/>
		  <input name='submit' type='submit' class="bnt" value=' 修 改 '></td>
		</tr>
</table>
   		</div>
        
</div>
</form>
<div style="text-align:center;margin:10px;">
<hr>
<a href="http://www.3gcms.cn" target="_blank">3GCMS</a> Version <font color="red"><?php echo C("version");?></font> &copy; <?php echo date("Y");;?> 版权所有
 
</div>
</body>
</html>