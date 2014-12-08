<div id="main">
<h2>サイトマップ</h2>
<h3>カテゴリ別</h3>

{foreach from=$param.category_list key=k item=v name=loop}
<div id="category_list">
<p>{$v.name}</p>
<p>
{foreach from=$param.category2_list.$k key=k2 item=v2 name=loop2}
<a href="/shop/list/category_cd/{$v2.cd}/">{$v2.name}</a>&nbsp;&nbsp;
{/foreach}
</p>
</div><!-- category_list end -->
{/foreach}
<p></p>
<h3>全商品一覧</h3>
<div id="category_list">
{foreach from=$param.item_list key=k item=v name=loop}
<p><a href="/shop/detail/cd/{$v.cd}/">{$v.Name}</a>　{$v.ShopPrice}円(税込み){if $v.StockStatus==0}※
在庫なし{/if}</p>{/foreach}
</div><!-- category_list end -->
</div><!-- main end -->
