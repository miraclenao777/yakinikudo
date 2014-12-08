<div id="main">
<h2>{$param.search}のショップ情報一覧</h2>
<p>総件数　{$param.count}件/{$param.page}ページ目を表示中</p>
{foreach from=$param.paging key=k item=v}
<a href="/shop2/list/category_cd/{$param.category_cd}/page/{$v}/">{$v}</a>&nbsp;
{/foreach} 
{foreach from=$param.item key=k item=v}
<div id="item_box">
<table>
    <tr>
        <td class="image"><a href="/shop2/detail/cd/{$v.cd}/" target="_blank"><img src="http://image.moshimo.com/item_image/{$v.ImageCode}/1/s.jpg" alt="{$v.Name}の画像"></a></td>
        <td class="item">
<dl>
<dd><h3><a class="name" href="/shop2/detail/cd/{$v.cd}/" target="_blank">{$v.Name}</a></h3></dd>
<dd><p>{$v.SpecialDescription}</p></dd> 
<dd class="price">価格：{$v.ShopPrice}円</b></font>（税込）</dd> 
<dd><a href="/shop2/detail/cd/{$v.cd}/" target="_blank"><img src="/images/btn/bt_detail.gif" alt="詳細を見る"></a>
{if $v.StockStatus!=0}
&nbsp;&nbsp;<a href="/shop2/location/cd/{$v.cd}/" target="_blank"><img src="/images/btn/bt_location.gif" alt="購入する"></a>
&nbsp;&nbsp;<a href="/shop2/cart/cd/{$v.cd}/" target="_blank"><img src="/images/btn/bt_cart.gif" alt="カートに入れる"></a></dd>
{else}
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
{/if}
</dl>        
        </td>
    </tr>
</table>
</div>
{foreachelse}
<p>該当の条件に当てはまる情報は見つかりませんでした。</p>
{/foreach} 
<div id="category_list">
<p>他のカテゴリを探してみる。</p>
<h3></h3>
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
⇒<a href="/shop2/">ショップ検索トップへ</a>
</div><!-- category_list end -->
</div><!-- main end -->
