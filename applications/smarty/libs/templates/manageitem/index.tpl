{include file='manage/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="back">
<h2>ショップ情報一覧</h2>
総件数　{$param.count}件/{$param.page}ページ目を表示中
{foreach from=$param.paging key=k item=v}
<a href="/manageitem/index/page/{$v}/search_category/{$param.search.category}/search_org_category/{$param.search.org_category}/search_stock_status/{$param.search.search_stock_status}/">{$v}</a>&nbsp;
{/foreach}
<form name="cate" action="/manageitem/" method="post">
<table width="840"　border="1">
<tr>
<td width="140" align="center">カテゴリ</td>
<td width="700" align="center">
<select name="search_category">  
<option value="">全部</option>
{foreach from=$param.search.category_list key=k item=v}
<option value="{$v.cd}"{if $param.search_category==$v.cd} SELECTED{/if}>{$v.parent_name}＞{$v.name}</option> 
{/foreach}
</select>
</td>
</tr>
<tr>
<td width="140" align="center">ORGカテゴリ</td>
<td width="700" align="center">
<select name="search_org_category"> 
<option value="">全部</option> 
{foreach from=$param.search.org_category_list key=k item=v}
<option value="{$v.cd}"{if $param.search_org_category==$v.cd} SELECTED{/if}>{$v.name}</option> 
{/foreach}
</select>
</td>
</tr>
<tr>
<td width="140" align="center">在庫</td>
<td width="700" align="center">
<select name="search_stock_status"> 
<option value="">全部</option> 
<option value="2"{if $param.search_stock_status==2} SELECTED{/if}>在庫あり</option>
<option value="1"{if $param.search_stock_status==1} SELECTED{/if}>在庫わずか</option>
<option value="0"{if $param.search_stock_status=="0"} SELECTED{/if}>在庫切れ</option>
</td>
</tr>
<tr>
<td width="140" align="center">状況</td>
<td width="700" align="center">
<select name="search_status"> 
<option value="">全部</option> 
<option value="1"{if $param.search_status==1} SELECTED{/if}>有効</option>
<option value="2"{if $param.search_status==2} SELECTED{/if}>待機</option>
<option value="0"{if $param.search_status=="0"} SELECTED{/if}>無効</option>
</td>
</tr>
 <tr>
<td width="140" align="center">販売価格</td>
  <td　width="700" align="center">
<input type="text" name="price_from" value="{$param.price_from}">
円から
<input type="text" name="price_to" value="{$param.price_to}">
円まで
  </td>
 </tr>
<tr>
<td width="140" align="center">その他</td>
  <td　width="700">
<input type="checkbox" name="is_newly" value="1"{if $param.is_newly==1} CHECKED{/if}>新着商品
<input type="checkbox" name="is_delivery_sameday" value="1"{if $param.is_delivery_sameday==1} CHECKED{/if}>即日配送
<input type="checkbox" name="is_free_shipping" value="1"{if $param.is_free_shipping==1} CHECKED{/if}>送料無料
  </td>
 </tr>
 <tr>
  <td width="140" align="center">フリーワード</td>
  <td width="700">
<input type="text" name="keyword" value="{$param.keyword}" size="50"><br>
<input type="checkbox" name="key_name" value="1"{if $param.key_name==1} CHECKED{/if}>商品名
<input type="checkbox" name="key_desc" value="1"{if $param.key_desc==1} CHECKED{/if}>商品説明
<input type="checkbox" name="key_point" value="1"{if $param.key_point==1} CHECKED{/if}>ポイント
<input type="checkbox" name="key_spec" value="1"{if $param.key_spec==1} CHECKED{/if}>商品スペック
<input type="checkbox" name="key_catch" value="1"{if $param.key_catch==1} CHECKED{/if}>キャッチコピー
<input type="checkbox" name="key_maker" value="1"{if $param.key_maker==1} CHECKED{/if}>メーカー名
<input type="checkbox" name="key_modelnomber" value="1"{if $param.key_modelnomber==1} CHECKED{/if}>型番
  </td>
 </tr>
 <tr>
  <td align="center" colspan="2">
　<input type="submit" name="submit" value="絞込み">
  </td>
 </tr>
</table>
</form>
<br><br>
<form name="cate" action="/manageitem/multicate/" method="post">
<select name="category_cd">  
{foreach from=$param.search.category_list key=k item=v}
<option value="{$v.cd}">{$v.parent_name}＞{$v.name}</option> 
{/foreach}
</select>
<input type="submit" name="submit" value="カテゴリ一括登録">
<table>
<tr>
<td width="20" align="center">操作</td>
<td width="60" align="center">cd</td>
<td width="80" align="center">画像</td>
<td width="400" align="center">名前</td>
<td width="80" align="center">価格</td>
<td width="100" align="center">在庫</td>
<td width="60" align="center">ORG<br>カテゴリ</td>
<td width="80" align="center">更新日</td>
<td width="40" align="center">状況</td>
</tr>
{foreach from=$param.item key=k item=v}
    <tr> 	
	    <td align="center">
<input type="checkbox" name="cd[]" value="{$v.cd}">	
	    </td>     
    	<td align="center">{$v.cd}</td>
        <td align="center"><img src="http://image.moshimo.com/item_image/{$v.ImageCode}/1/s.jpg" alt="{$v.name}の画像"></td>
        <td><a href="/manageitem/upd1/cd/{$v.cd}/">{$v.Name}</a></td>
        <td align="center">{$v.ShopPrice}円</td>
        <td align="center">
{if $v.StockStatus==0}
在庫切れ
{elseif $v.StockStatus==1}
在庫わずか
{else}
在庫あり
{/if}</td>
<td align="center">{$v.CategoryName}</td>
<td align="center">{$v.timestamp}</td>
        <td align="center">
{if $v.status==0}
無効
{elseif $v.status==1}
有効
{elseif $v.status==2}
待機
{/if}</td>
    </tr>
{foreachelse}
<tr><td colspan="7">該当の条件に当てはまる情報は見つかりませんでした。</td></tr>
{/foreach}     
</table>	

</form>

<a href="/manage/login/">管理画面トップ</a><br>
<a href="/manage/logout/">ログアウト</a><br>
</div>
</div>
</body>
</html>