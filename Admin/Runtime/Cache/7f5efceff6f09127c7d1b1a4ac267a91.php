<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Upload</title>
<style> 
body {padding:0;margin:0;background:#F2F9E8;}
body,td {font-size:12px;}
</style>
<body>
<form name=form action="__URL__/uploadwatermark" method=post enctype="multipart/form-data"><div style='text-align:left;'><input type=file name="watermarkimg" size=15  style="width:250px;" onfocus="javascript:this.className='fbform1';" onblur="javascript:this.className='fbform';">&nbsp;<input type=submit name=submit value="上传"></div></form> 
</body>
</html>