<?php /* Smarty version 2.6.26, created on 2013-06-29 07:24:39
         compiled from shop/index_body.tpl */ ?>
<div id="main">
<h2>焼肉堂　焼肉検索</h2>
<p>カテゴリを選択してください。</p>
<?php $_from = $this->_tpl_vars['param']['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop']['iteration']++;
?>
<div id="category_list">
<h3><?php echo $this->_tpl_vars['v']['name']; ?>
</h3>
<table>
<tr>
<?php $_from = $this->_tpl_vars['param']['category2_list'][$this->_tpl_vars['k']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['v2']):
        $this->_foreach['loop2']['iteration']++;
?>
<?php if (($this->_foreach['loop2']['iteration']-1) % 4 == 0 && $this->_tpl_vars['k2'] != 0): ?>
</tr>
<tr>
<?php endif; ?>
<td>
<p><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v2']['cd']; ?>
/"><?php echo $this->_tpl_vars['v2']['name']; ?>
</a></p>
</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
<tr><td></td><td></td><td></td><td></td></tr>
</table>
</div><!-- category_list end -->
<?php endforeach; endif; unset($_from); ?>
</div><!-- main end -->