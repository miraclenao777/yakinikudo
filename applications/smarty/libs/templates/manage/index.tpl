{include file='manage/head.tpl'}
<body>
<div id="bg">
管理画面<br>
<div id="errmsg">
{$param.errmsg}
</div>
<form action="/manage/login/" method="post">
PASS:<input type="password" name="pass" value="" size="20"><br>
<input type="submit" name="login" value="ログイン" size="20">
</form>
</div><!-- main end -->
</body>
</html>