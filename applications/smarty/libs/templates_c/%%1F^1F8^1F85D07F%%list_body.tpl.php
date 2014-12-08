<?php /* Smarty version 2.6.26, created on 2013-06-29 07:06:50
         compiled from shop/list_body.tpl */ ?>
<div id="main">
<h2><?php echo $this->_tpl_vars['param']['search']; ?>
　焼肉情報一覧</h2>
<p>総件数　<?php echo $this->_tpl_vars['param']['count']; ?>
件/<?php echo $this->_tpl_vars['param']['page']; ?>
ページ目を表示中</p>
<?php $_from = $this->_tpl_vars['param']['paging']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<a class="chin" href="/shop/list/category_cd/<?php echo $this->_tpl_vars['param']['category_cd']; ?>
/page/<?php echo $this->_tpl_vars['v']; ?>
/"><?php echo $this->_tpl_vars['v']; ?>
</a>&nbsp;
<?php endforeach; endif; unset($_from); ?> 
<?php $_from = $this->_tpl_vars['param']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<div id="item_box">
<table>
    <tr>
        <td class="image" rowspan="2"><a href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['v']['ImageCode']; ?>
/1/m.jpg" alt="<?php echo $this->_tpl_vars['v']['Name']; ?>
の画像"></a></td>
        <td class="item" colspan="2">
<dl>
<dd><h3><a class="name" href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a></h3></dd>
<dd>
<p><?php echo $this->_tpl_vars['v']['CatchCopy']; ?>
</p>
<p><?php echo $this->_tpl_vars['v']['SpecialDescription']; ?>
</p></dd> 
<dd class="price">価格：<?php echo $this->_tpl_vars['v']['ShopPrice']; ?>
円（税込）</dd> 
<?php if ($this->_tpl_vars['v']['StockStatus'] != 0): ?>
</td>
</tr>
<tr>
<td class="item_sel"><p>
<form action="/shop/cart/" method="GET" target="_blank">
                        <select name="amount">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                        </select>
個</p>
</td>
<td class="item_btn">                        
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['v']['cd']; ?>
">
<input type="image" src="/images/btn/bt_cart.gif" alt="カートに入れる">
</form>

<?php else: ?>
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
<?php endif; ?>
</dl>        
        </td>
    </tr>
</table>
</div>
<?php endforeach; else: ?>
<p class="chin">該当の条件に当てはまる情報は見つかりませんでした。</p>
<?php endif; unset($_from); ?> 
<div id="category_list">
<p class="chin">他のカテゴリを探してみる。</p>
<table>
<tr>
<?php $_from = $this->_tpl_vars['param']['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop']['iteration']++;
?>
<?php if (($this->_foreach['loop']['iteration']-1) % 3 == 0 && $this->_tpl_vars['k'] != 0): ?>
</tr>
<tr>
<?php endif; ?>
<td>
<p><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></p>
</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
</table>
⇒<a href="/chinpin/">ショップ検索トップへ</a>
</div><!-- category_list end -->
</div><!-- main end -->