<div id="main">
<h2>{$param.search}　焼肉情報一覧</h2>
<p>総件数　{$param.count}件/{$param.page}ページ目を表示中</p>
{foreach from=$param.paging key=k item=v}
<a class="chin" href="/shop/list/category_cd/{$param.category_cd}/page/{$v}/">{$v}</a>&nbsp;
{/foreach} 
{foreach from=$param.item key=k item=v}
<div id="item_box">
<table>
    <tr>
        <td class="image" rowspan="2"><a href="/shop/detail/cd/{$v.cd}/" target="_blank"><img src="http://image.moshimo.com/item_image/{$v.ImageCode}/1/m.jpg" alt="{$v.Name}の画像"></a></td>
        <td class="item" colspan="2">
<dl>
<dd><h3><a class="name" href="/shop/detail/cd/{$v.cd}/" target="_blank">{$v.Name}</a></h3></dd>
<dd>
<p>{$v.CatchCopy}</p>
<p>{$v.SpecialDescription}</p></dd> 
<dd class="price">価格：{$v.ShopPrice}円（税込）</dd> 
{if $v.StockStatus!=0}
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
<input type="hidden" name="cd" value="{$v.cd}">
<input type="image" src="/images/btn/bt_cart.gif" alt="カートに入れる">
</form>

{else}
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
{/if}
</dl>        
        </td>
    </tr>
</table>
</div>
{foreachelse}
<p class="chin">該当の条件に当てはまる情報は見つかりませんでした。</p>
{/foreach} 
<div id="category_list">
<p class="chin">他のカテゴリを探してみる。</p>
<table>
<tr>
{foreach from=$param.category_list key=k item=v name=loop}
{if $smarty.foreach.loop.index % 3 == 0 && $k != 0}
</tr>
<tr>
{/if}
<td>
<p><a href="/shop/list/category_cd/{$v.cd}/">{$v.name}</a></p>
</td>
{/foreach}
</tr>
</table>
⇒<a href="/chinpin/">ショップ検索トップへ</a>
</div><!-- category_list end -->
</div><!-- main end -->
