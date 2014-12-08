<?php /* Smarty version 2.6.26, created on 2013-06-24 13:54:02
         compiled from shop/detail_body.tpl */ ?>
<div id="detail">
<h2><a href="/shop/location/cd/<?php echo $this->_tpl_vars['param']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['param']['name']; ?>
</a></h2>
<?php if ($this->_tpl_vars['param']['catchcopy'] != ""): ?><p><?php echo $this->_tpl_vars['param']['catchcopy']; ?>
</p><?php endif; ?>
<table>
    <tr>
        <td class="image" rowspan="2">
<img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['param']['imagecode']; ?>
/<?php echo $this->_tpl_vars['param']['image_no']; ?>
/l.jpg" alt="<?php echo $this->_tpl_vars['param']['name']; ?>
の画像">        
        </td>
        <td class="location">
<?php if ($this->_tpl_vars['param']['stockstatus'] != 0): ?>
<form action="/shop/cart/" method="GET">個数
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
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['param']['cd']; ?>
">
<?php endif; ?>
        </td>
        <td class="location2"> 
<?php if ($this->_tpl_vars['param']['stockstatus'] != 0): ?>              
<input type="image" src="/images/btn/bt_cart_l.gif" alt="カートに入れる">
</form>
<?php endif; ?>
        </td>
    </tr>
    <tr>            
        <td class="image2" colspan="2">
<p>他の画像を見る</p>
<?php unset($this->_sections['image']);
$this->_sections['image']['name'] = 'image';
$this->_sections['image']['start'] = (int)1;
$this->_sections['image']['loop'] = is_array($_loop=$this->_tpl_vars['param']['imagecount']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['image']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['image']['show'] = true;
$this->_sections['image']['max'] = $this->_sections['image']['loop'];
if ($this->_sections['image']['start'] < 0)
    $this->_sections['image']['start'] = max($this->_sections['image']['step'] > 0 ? 0 : -1, $this->_sections['image']['loop'] + $this->_sections['image']['start']);
else
    $this->_sections['image']['start'] = min($this->_sections['image']['start'], $this->_sections['image']['step'] > 0 ? $this->_sections['image']['loop'] : $this->_sections['image']['loop']-1);
if ($this->_sections['image']['show']) {
    $this->_sections['image']['total'] = min(ceil(($this->_sections['image']['step'] > 0 ? $this->_sections['image']['loop'] - $this->_sections['image']['start'] : $this->_sections['image']['start']+1)/abs($this->_sections['image']['step'])), $this->_sections['image']['max']);
    if ($this->_sections['image']['total'] == 0)
        $this->_sections['image']['show'] = false;
} else
    $this->_sections['image']['total'] = 0;
if ($this->_sections['image']['show']):

            for ($this->_sections['image']['index'] = $this->_sections['image']['start'], $this->_sections['image']['iteration'] = 1;
                 $this->_sections['image']['iteration'] <= $this->_sections['image']['total'];
                 $this->_sections['image']['index'] += $this->_sections['image']['step'], $this->_sections['image']['iteration']++):
$this->_sections['image']['rownum'] = $this->_sections['image']['iteration'];
$this->_sections['image']['index_prev'] = $this->_sections['image']['index'] - $this->_sections['image']['step'];
$this->_sections['image']['index_next'] = $this->_sections['image']['index'] + $this->_sections['image']['step'];
$this->_sections['image']['first']      = ($this->_sections['image']['iteration'] == 1);
$this->_sections['image']['last']       = ($this->_sections['image']['iteration'] == $this->_sections['image']['total']);
?>
<a href="/shop/detail/cd/<?php echo $this->_tpl_vars['param']['cd']; ?>
/image_no/<?php echo $this->_sections['image']['index']; ?>
/">
<img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['param']['imagecode']; ?>
/<?php echo $this->_sections['image']['index']; ?>
/m.jpg" alt="<?php echo $this->_tpl_vars['param']['name']; ?>
の画像">
</a>
<?php endfor; endif; ?> 
<br>
<a href="/shop/review/cd/<?php echo $this->_tpl_vars['param']['cd']; ?>
/" target="_blank">口コミ/感想/レビューを見る</a>
       
        </td>        
    </tr>
</table>

<dl>
<?php if ($this->_tpl_vars['param']['makername'] != ""): ?><dt>メーカー名</dt><dd><p><?php echo $this->_tpl_vars['param']['makername']; ?>
</p></dd><?php endif; ?>
<?php if ($this->_tpl_vars['param']['modelnumber'] != '0'): ?><dt>型番</dt><dd><p><?php echo $this->_tpl_vars['param']['modelnumber']; ?>
</p></dd><?php endif; ?>
<?php if ($this->_tpl_vars['param']['DispDescription'] != ""): ?><dt>商品説明</dt><dd><p><?php echo $this->_tpl_vars['param']['DispDescription']; ?>
</p></dd><?php endif; ?>
<?php if ($this->_tpl_vars['param']['specialdescription'] != ""): ?><dt>ポイント</dt><dd><p><?php echo $this->_tpl_vars['param']['specialdescription']; ?>
</p></dd><?php endif; ?>
<?php if ($this->_tpl_vars['param']['spec'] != ""): ?><dt>商品スペック</dt><dd><p><?php echo $this->_tpl_vars['param']['spec']; ?>
</p></dd><?php endif; ?>
<dt>価格</dt><dd class="price"><p><?php echo $this->_tpl_vars['param']['shopprice']; ?>
円(税込)</p></dd>
<dt>支払方法</dt><dd><p>
<?php if ($this->_tpl_vars['param']['paymenttype'] == 1): ?>
クレジット支払のみ
<?php elseif ($this->_tpl_vars['param']['stockstatus'] == 3): ?>
クレジットもしくは代引き
<?php endif; ?>
</p></dd>
<dt>在庫状況</dt><dd><p>
<?php if ($this->_tpl_vars['param']['stockstatus'] == 0): ?>
在庫切れ
<?php elseif ($this->_tpl_vars['param']['stockstatus'] == 1): ?>
在庫わずか
<?php else: ?>在庫あり
<?php endif; ?>
</p>
</dd> 
<dt>備考</dt><dd><p>
<?php if ($this->_tpl_vars['param']['isdeliverysameday'] == 1): ?>
即日配送<br>
<?php endif; ?>
<?php if ($this->_tpl_vars['param']['isfreeshipping'] == 1): ?>
送料無料<br>
<?php endif; ?>
<?php if ($this->_tpl_vars['param']['bundleimpossible'] == 1): ?>
同梱不可<br>
<?php endif; ?>
</p></dd>
<dt></dt>
<?php if ($this->_tpl_vars['param']['stockstatus'] == 0): ?>
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
<?php endif; ?>
</dl>
</div><!-- detail end -->


