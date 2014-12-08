{include file='manage/head.tpl'}
<body>
<div id="bg">
<div id="container">
商品詳細
<div id="back">
<form action="/manageitem/upd2/" method="post">
<table>
<tr><td width="100">CD</td><td width="740"><p>{$param.cd}</p></td></tr>
<tr><td>名前</td><td><p>{$param.name}</p></td></tr>
<tr><td>カテゴリ</td>
<td>
{foreach from=$param.category_list key=k item=v}
<input type="checkbox" name="cate_cd[]" value="{$v.cd}"{if in_array($v.cd,$param.cate_cd)} CHECKED{/if}>{$v.parent_name}＞{$v.name}<br>
{/foreach}
</td>
</tr>
<tr><td>ORGカテゴリ</td><td><p>{$param.CategoryName}</p></td></tr>
<tr><td>表示キーワード</td>
<td><input type="text" name="DispKeyword" value="{$param.DispKeyword}" size="40"></td></tr>
<tr><td>Description</td><td><textarea name="DispDescription2" rows="30" cols="100">{$param.DispDescription2}</textarea></td></tr>
<tr><td>ORG商品説明</td><td><p>{$param.description}</p></td></tr>
<tr><td>表示商品説明</td><td><textarea name="DispDescription" rows="30" cols="100">{$param.DispDescription}</textarea></td></tr>
<tr><td>ポイント</td><td><p>{$param.specialdescription}</p></td></tr>
<tr><td>商品スペック</td><td><p>{$param.spec}</p></td></tr>
<tr><td>メーカー名</td><td><p>{$param.makername}</p></td></tr>
<tr><td>型番</td><td><p>{$param.modelnumber}</p></td></tr>
<tr><td>価格</td><td><p>{$param.shopprice}円(税込)</p></td></tr>
<tr><td>支払方法</td><td><p>
{if $param.paymenttype==1}
クレジット支払のみ
{elseif $param.stockstatus==3}
クレジットもしくは代引き
{/if}
</p></td></tr>
<tr><td>在庫</td>
<td>
{if $param.StockStatus==0}
在庫切れ
{elseif $param.StockStatus==1}
在庫わずか
{else}
在庫あり
{/if}
</td></tr>
<tr><td>備考</td>
<td>
{if $param.isdeliverysameday==1}
即日配送<br>
{/if}
{if $param.isfreeshipping==1}
送料無料<br>
{/if}
{if $param.bundleimpossible==1}
同梱不可<br>
{/if}
</td></tr>

<tr><td>状況</td>
<td>
   <input type="radio" name="status" value="1"{if $param.status==1} CHECKED{/if}>有効
   <input type="radio" name="status" value="2"{if $param.status==2} CHECKED{/if}>待機
   <input type="radio" name="status" value="0"{if $param.status==0} CHECKED{/if}>無効
</td></tr>
</table>
<input type="submit" value="　更　新　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="category_cd" value="{$param.category.cd}" size="40">
</form>
<br>
<a href="/manageitem/index/">トップへ戻る</a><br>
<a href="/manage/login/">管理画面トップ</a><br>
<a href="/manage/logout/">ログアウト</a><br>
</div><!-- detail end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>












