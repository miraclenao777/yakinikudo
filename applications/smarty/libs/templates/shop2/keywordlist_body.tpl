<div id="main">
<div id="search_box">
<h2>検索結果一覧</h2>
<table>
　<tr>
　　<th>キーワード</th>
　　<td>{$param.search_disp.keyword}</td>
　</tr>
　<tr>
　　<th>販売価格</th>
　　<td>
{if $param.search_disp.price_from!=""}
{$param.search_disp.price_from}円
{else}
下限なし
{/if}
から
{if $param.search_disp.price_to!=""}
{$param.search_disp.price_to}円
{else}
上限なし
{/if}
まで</td>
　</tr>
　<tr>
　　<th>オプション</th>
　　<td>
{if $param.search_disp.is_newly==1}
新着商品&nbsp;&nbsp;
{/if}
{if $param.search_disp.is_delivery_sameday==1}
即日配送&nbsp;&nbsp;
{/if}
{if $param.search_disp.is_free_shipping==1}
送料無料&nbsp;&nbsp;
{/if}

　　</td>
　</tr>
　<tr>
　　<th>カテゴリ</th>
　　<td>{$param.search_disp.category}</td>
　</tr>
</table>
</div>
総件数　{$param.count}件/{$param.page}ページ目を表示中
{foreach from=$param.paging key=k item=v}
<a href="/shop2/keywordlist/page/{$v}/{$param.search_param}">{$v}</a>&nbsp;
{/foreach} 
{foreach from=$param.item key=k item=v}
<div id="item_box">
<table>
    <tr>
        <td class="image"><a href="/shop2/detail/cd/{$v.cd}/" target="_blank"><img src="http://image.moshimo.com/item_image/{$v.ImageCode}/1/s.jpg" alt="{$v.name}の画像"></a></td>
        <td class="item">
<dl>
<dd><h3><a class="name" href="/shop2/detail/cd/{$v.cd}/" target="_blank">{$v.Name}</a></h3></dd>
<dd><p>{$v.SpecialDescription}</p></dd> 
<dd class="price">価格：{$v.ShopPrice}円</b></font>（税込）</dd> 
<dd><a href="/shop2/detail/cd/{$v.cd}/" target="_blank"><img src="/images/btn/bt_detail.gif" alt="カートに入れる"></a>
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
⇒<a href="/shop2/keyword">再度検索する</a>
</div><!-- category_list end -->
</div><!-- main end -->
