<?php /* Smarty version 2.6.26, created on 2013-07-02 13:36:04
         compiled from manage/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'manage/head.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div id="bg">
管理画面<br>
<div id="errmsg">
<?php echo $this->_tpl_vars['param']['errmsg']; ?>

</div>
<form action="/manage/login/" method="post">
PASS:<input type="password" name="pass" value="" size="20"><br>
<input type="submit" name="login" value="ログイン" size="20">
</form>
</div><!-- main end -->
</body>
</html>