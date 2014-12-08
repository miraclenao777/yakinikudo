<div id="main">
<h2>Ｂクラスデパート　カテゴリ検索</h2>
<p>カテゴリを選択してください。</p>
{foreach from=$param.category_list key=k item=v name=loop}
<div id="category_list">
<h3>{$v.name}</h3>
<table>
<tr>
{foreach from=$param.category2_list.$k key=k2 item=v2 name=loop2}
{if $smarty.foreach.loop2.index % 3 == 0 && $k2 != 0}
</tr>
<tr>
{/if}
<td>
{if $v2.leaf==1}
<a href="/shop2/list/category_cd/{$v2.cd}/">{$v2.name}</a>
{else}
<a href="/shop2/category/category_cd/{$v2.cd}/">{$v2.name}</a>
{/if}

</td>
{/foreach}
</tr>
</table>
</div><!-- category_list end -->
{/foreach}
</div><!-- main end -->
