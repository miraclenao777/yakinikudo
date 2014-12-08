<div id="main">
<h2>Ｂ級ショップ検索（ノーマル）＞サブカテゴリ検索</h2>
<p>サブカテゴリを選択してください。</p>
<div id="category_list">
<h3>{$param.category.name}</h3>
<table>
<tr>
{foreach from=$param.category_list key=k item=v name=loop}
{if $smarty.foreach.loop.index % 3 == 0 && $k != 0}
</tr>
<tr>
{/if}
<td>
{if $v.leaf==1}
<a href="/shop2/list/category_cd/{$v.cd}/">{$v.name}</a>
{else}
<a href="/shop2/category/category_cd/{$v.cd}/">{$v.name}</a>
{/if}
</td>
{/foreach}
</tr>
</table>
</div><!-- category_list end -->
</div><!-- main end -->
