<?php /* Smarty version 2.6.26, created on 2013-06-24 19:06:28
         compiled from index/index_body.tpl */ ?>
<div id="main">
<div id="index_left">
<h2><a href="/shop/">焼肉検索</a></h2>
<h3>有名店</h3>
<p>
<ul>
<?php $_from = $this->_tpl_vars['param']['category_list']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop2']['iteration']++;
?>
<li><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</p>
<h3>ブランド牛</h3>
<p>
<ul>
<?php $_from = $this->_tpl_vars['param']['category_list']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop2']['iteration']++;
?>
<li><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</p>
<h3>部位別</h3>
<p>
<ul>
<?php $_from = $this->_tpl_vars['param']['category_list']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop2']['iteration']++;
?>
<li><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</p>
<h3>用途別</h3>
<p>
<ul>
<?php $_from = $this->_tpl_vars['param']['category_list']['4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop2']['iteration']++;
?>
<li><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</p>
<h3>B級グルメ</h3>
<p>
<ul>
<?php $_from = $this->_tpl_vars['param']['category_list']['5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop2']['iteration']++;
?>
<li><a href="/shop/list/category_cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</p>
</div>
<div id="index_body">

<div id="index_box">
<h2><font color="red">焼肉専門通販ショップ「焼肉堂」2013年５月オープン</font></h2>
<p>焼肉専門通販ショップ「焼肉堂」は豊富な品揃えと充実した検索機能を備えて<br>2013年５月にオープンいたしました。</p>
<p>亀山社中などのブランド店や松阪牛・石垣牛などのブランド牛、<br>B級グルメ商品など全国各地より仕入れております。</p>
<p>是非、この機会にみんなで焼肉パーティーを。</p>
</div>

<div id="index_box">
<h2><font color="red">「焼肉堂」の使い方１</font></h2>
<p>１．まず、左側にあるカテゴリを選びます。</p>
<p>ブランド店別、ブランド牛別、カルビなどの部位別など、「焼肉堂」では細かく分けられてます。</p>
<p>２．カテゴリをクリックすると該当する商品の一覧が出てきます。</p>
<p>一覧画面で商品名をクリックすると詳細が出ますが、一覧画面からも一括購入することも可能です。</p>
<p>３．カートに入れたらあとは画面に従って購入するだけ。</p>
<p>これで商品が買えちゃいます。</p>
</div>

<div id="index_box">
<h2><font color="red">「焼肉堂」の使い方２</font></h2>
<p>「焼肉堂」には、他のサイトにはない特別な探し方があるんです。</p>
<p>それはタイトルロゴの下にあるキーワードボックス。</p>
<p>キーワードを入れて検索するだけで、該当する商品が出てきます。</p>
<p>その後の流れは通常と同じです。</p>
<p>他では検索できない商品が引っかかるかもです。</p>
</div>

<div id="index_box">
<h2><font color="red">新着商品</font></h2>
<p>極上の新着商品をお届けします。</p>
<table border="1">
 <tr>
<?php $_from = $this->_tpl_vars['param']['index_item']['new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop3'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop3']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop3']['iteration']++;
?> 
  <td>
<dl>
<dd>
<a href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['v']['ImageCode']; ?>
/1/l.jpg" width="190" height="190" alt="<?php echo $this->_tpl_vars['v']['Name']; ?>
の画像"></a>  
</dd>
<dd>
<a class="name" href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a>
</dd>
<dd>
<p>価格：<?php echo $this->_tpl_vars['v']['ShopPrice']; ?>
円（税込）</p>
</dd>
<dd>
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
個                        
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['v']['cd']; ?>
">
<input type="submit" value="カートに入れる">
</dd>
</form>    
</dl>
  </td> 
<?php endforeach; endif; unset($_from); ?>
 </tr>
</table>  
</div><!-- index_box end -->

<div id="index_box">
<h2><font color="red">「焼肉堂」お勧め商品</font></h2>
<p>焼肉堂が自信を持ってお勧めする商品です。</p>
<table border="1">
 <tr>
<?php $_from = $this->_tpl_vars['param']['index_item']['favorite']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop']['iteration']++;
?> 
  <td>
<dl>
<dd>
<p><a href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['v']['ImageCode']; ?>
/1/l.jpg" width="190" height="190" alt="<?php echo $this->_tpl_vars['v']['Name']; ?>
の画像"></a></p>  
</dd>
<dd>
<p><a class="name" href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a><・p>
</dd>
<dd>
<p>価格：<?php echo $this->_tpl_vars['v']['ShopPrice']; ?>
円（税込）</p>
</dd>
<dd>
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
個                        
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['v']['cd']; ?>
">
<input type="submit" value="カートに入れる">
</dd>
</form>    
</dl>
  </td> 
<?php endforeach; endif; unset($_from); ?>
 </tr>
</table>  
</div><!-- index_box end -->


<div id="index_box">
<h2><font color="red">亀山社中</font></h2>
<p>今、日本で一番有名な焼肉ブランド、亀山社中。秘伝のモミタレが食欲をそそります。</p>
<table border="1">
 <tr>
<?php $_from = $this->_tpl_vars['param']['index_item']['kameyama']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop']['iteration']++;
?> 
  <td>
<dl>
<dd>
<a href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['v']['ImageCode']; ?>
/1/l.jpg" width="190" height="190" alt="<?php echo $this->_tpl_vars['v']['Name']; ?>
の画像"></a>  
</dd>
<dd>
<a class="name" href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a>
</dd>
<dd>
<p>価格：<?php echo $this->_tpl_vars['v']['ShopPrice']; ?>
円（税込）</p>
</dd>
<dd>
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
個                        
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['v']['cd']; ?>
">
<input type="submit" value="カートに入れる">
</dd>
</form>    
</dl>
  </td> 
<?php endforeach; endif; unset($_from); ?>
 </tr>
</table>  
</div><!-- index_box end -->


<div id="index_box">
<h2><font color="red">ただいま人気のご当地グルメ（B級グルメ）</font></h2>
<p>巷で人気が急上昇中のB級グルメ。焼肉堂なら、きっとあなたにピッタリのB級グルメが見つかります。</p>
<table border="1">
 <tr>
<?php $_from = $this->_tpl_vars['param']['index_item']['bq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['loop']['iteration']++;
?> 
  <td>
<dl>
<dd>
<a href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><img src="http://image.moshimo.com/item_image/<?php echo $this->_tpl_vars['v']['ImageCode']; ?>
/1/l.jpg" width="190" height="190" alt="<?php echo $this->_tpl_vars['v']['Name']; ?>
の画像"></a>  
</dd>
<dd>
<a class="name" href="/shop/detail/cd/<?php echo $this->_tpl_vars['v']['cd']; ?>
/" target="_blank"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a>
</dd>
<dd>
<p>価格：<?php echo $this->_tpl_vars['v']['ShopPrice']; ?>
円（税込）</p>
</dd>
<dd>
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
個                        
<input type="hidden" name="cd" value="<?php echo $this->_tpl_vars['v']['cd']; ?>
">
<input type="submit" value="カートに入れる">
</dd>
</form>    
</dl>
  </td> 
<?php endforeach; endif; unset($_from); ?>
 </tr>
</table>  
</div><!-- index_box end -->

</div><!-- index_body end -->


</div><!-- main end -->