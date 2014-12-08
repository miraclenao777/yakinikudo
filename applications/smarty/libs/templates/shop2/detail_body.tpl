<div id="detail">
<h2><a href="/shop2/location/cd/{$param.cd}/">{$param.name}</a></h2>
{if $param.catchcopy != ""}<p>{$param.catchcopy}</p>{/if}
<table>
    <tr>
        <td>
<img src="http://image.moshimo.com/item_image/{$param.imagecode}/{$param.image_no}/l.jpg" alt="{$param.name}の画像">        
        </td>
        <td class="location">  
{if $param.stockstatus!=0}        
&nbsp;&nbsp;<a href="/shop2/location/cd/{$param.cd}/"><img src="/images/btn/bt_location_l.gif" alt="購入する"></a><br><br>
&nbsp;&nbsp;<a href="/shop2/cart/cd/{$param.cd}/"><img src="/images/btn/bt_cart_l.gif" alt="カートに入れる"></a></dd>        
{/if}
        </td>
    </tr>
</table>
<p>他の画像を見る</p>
{section name=image start=1 loop=$param.imagecount+1 step=1}
<a href="/shop2/detail/cd/{$param.cd}/image_no/{$smarty.section.image.index}/">
<img src="http://image.moshimo.com/item_image/{$param.imagecode}/{$smarty.section.image.index}/s.jpg" alt="{$param.name}の画像">
</a>
{/section}      
<dl>
{if $param.makername != ""}<dt>メーカー名</dt><dd><p>{$param.makername}</p></dd>{/if}
{if $param.modelnumber != "0"}<dt>型番</dt><dd><p>{$param.modelnumber}</p></dd>{/if}
{if $param.description != ""}<dt>商品説明</dt><dd><p>{$param.description}</p></dd>{/if}
{if $param.SpecialDescription != ""}<dt>ポイント</dt><dd><p>{$param.SpecialDescription}</p></dd>{/if}
{if $param.Spec != ""}<dt>商品スペック</dt><dd><p>{$param.Spec}</p></dd>{/if}
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
{if $param.stockstatus!=0}
&nbsp;&nbsp;<a href="/shop2/location/cd/{$param.cd}/" target="_blank"><img src="/images/btn/bt_location.gif" alt="購入する"></a>
&nbsp;&nbsp;<a href="/shop2/cart/cd/{$param.cd}/" target="_blank"><img src="/images/btn/bt_cart.gif" alt="カートに入れる"></a>
{else}
<p><font color="red"><b>この商品は現在在庫が存在しないため購入できません。</b></font></p>
{/if}
</dl>
</div><!-- detail end -->



