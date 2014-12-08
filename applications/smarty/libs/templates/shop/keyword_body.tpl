<div id="main">
<h2>焼肉堂　キーワード検索</h2>
<p>項目を選択し検索ボタンをクリックしてください。</p>
<form action="/shop/keywordlist/" method="get">
<div id="category_list">
<h3>フリーワード</h3>
<table>
 <tr>
  <td>
<input type="text" name="keyword" value="" size="20">
<input type="radio" name="key_name" value="0" checked>商品名のみ
<input type="radio" name="key_name" value="1">説明も含む
  </td>
 </tr>
</table>
</div>
<div id="searchbtn">
<input type="submit" name="submit" value="　検　索　">	
</div>
<div id="category_list">
<h3>販売価格</h3>
<table>
 <tr>
  <td>
<input type="text" name="price_from" value="">
円から
<input type="text" name="price_to" value="">
円まで
  </td>
 </tr>
</table>
</div>
<div id="searchbtn">
<input type="submit" name="submit" value="　検　索　">	
</div>
<div id="category_list">
<h3>オプション</h3>
<table>
 <tr>
  <td>
<input type="checkbox" name="is_newly" value="1">新着商品
<input type="checkbox" name="is_delivery_sameday" value="1">即日配送
<input type="checkbox" name="is_free_shipping" value="1">送料無料
  </td>
 </tr>
</table>
</div>
<div id="searchbtn">
<input type="submit" name="submit" value="　検　索　">	
</div>
<div id="category_list">
<h3>カテゴリ</h3>
{foreach from=$param.category_list key=k item=v name=loop}
<h4>{$v.name}</h4>
<table>
<tr>
{foreach from=$param.category2_list.$k key=k2 item=v2 name=loop2}
{if $smarty.foreach.loop2.index % 2 == 0 && $k2 != 0}
</tr>
<tr>
{/if}
<td>
<input type="checkbox" name="category_cd[]" value="{$v2.cd}">
<a href="/shop/list/category_cd/{$v2.cd}/">{$v2.name}</a>
</td>
{/foreach}
</tr>
</table>
{/foreach}
</div>
<div id="searchbtn">
<input type="submit" name="submit" value="　検　索　">	
</div>
</form>
</div><!-- main end -->
