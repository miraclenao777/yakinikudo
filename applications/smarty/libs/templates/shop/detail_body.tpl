<div id="detail">
<h2><a href="/shop/location/cd/{$param.cd}/" target="_blank">{$param.name}</a></h2>
{if $param.catchcopy != ""}<p>{$param.catchcopy}</p>{/if}
<table>
    <tr>
        <td class="image" rowspan="2">
<img src="http://image.moshimo.com/item_image/{$param.imagecode}/{$param.image_no}/l.jpg" alt="{$param.name}の画像">        
        </td>
        <td class="location">
{if $param.stockstatus!=0}
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
<input type="hidden" name="cd" value="{$param.cd}">
{/if}
        </td>
        <td class="location2"> 
{if $param.stockstatus!=0}              
<input type="image" src="/images/btn/bt_cart_l.gif" alt="カートに入れる">
</form>
{/if}
        </td>
    </tr>
    <tr>            
        <td class="image2" colspan="2">
<p>他の画像を見る</p>
{section name=image start=1 loop=$param.imagecount+1 step=1}
<a href="/shop/detail/cd/{$param.cd}/image_no/{$smarty.section.image.index}/">
<img src="http://image.moshimo.com/item_image/{$param.imagecode}/{$smarty.section.image.index}/m.jpg" alt="{$param.name}の画像">
</a>
{/section} 
<br>
<a href="/shop/review/cd/{$param.cd}/" target="_blank">口コミ/感想/レビューを見る</a>
       
        </td>        
    </tr>
</table>

<dl>
{if $param.makername != ""}<dt>メーカー名</dt><dd><p>{$param.makername}</p></dd>{/if}
{if $param.modelnumber != "0"}<dt>型番</dt><dd><p>{$param.modelnumber}</p></dd>{/if}
{if $param.DispDescription != ""}<dt>商品説明</dt><dd><p>{$param.DispDescription}</p></dd>{/if}
{if $param.specialdescription != ""}<dt>ポイント</dt><dd><p>{$param.specialdescription}</p></dd>{/if}
{if $param.spec != ""}<dt>商品スペック</dt><dd><p>{$param.spec}</p></dd>{/if}
<dt>価格</dt><dd class="price"><p>{$param.shopprice}円(税込)</p></dd>
<dt>支払方法</dt><dd><p>
{if $param.paymenttype==1}
クレジット支払のみ
{elseif $param.stockstatus==3}
クレジットもしくは代引き
{/if}
</p></dd>
<dt>在庫状況</dt><dd><p>
{if $param.stockstatus==0}
在庫切れ
{elseif $param.stockstatus==1}
在庫わずか
{else}在庫あり
{/if}
</p>
</dd> 
<dt>備考</dt><dd><p>
{if $param.isdeliverysameday==1}
即日配送<br>
{/if}
{if $param.isfreeshipping==1}
送料無料<br>
{/if}
{if $param.bundleimpossible==1}
同梱不可<br>
{/if}
</p></dd>
<dt></dt>
{if $param.stockstatus==0}
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
{/if}
</dl>
</div><!-- detail end -->



