{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="main">
商品更新（確認）<br>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}

<table>
<form action="/manageitem/upd3/" method="post">
<tr><td width="100">CD</td><td width="740"><p>{$param.cd}</p></td></tr>
<tr><td>名前</td><td><p>{$param.name}</p></td></tr>
<tr><td>カテゴリ</td>
<td>
{foreach from=$param.category_list key=k item=v}
<input type="hidden" name="cate_cd[]" value="{$v.cd}">{$v.parent_name}＞{$v.name}<br>
{/foreach}
</td>
<tr><td>表示キーワード</td>
<td><p>{$param.DispKeyword}</p></td></tr>
<tr><td>Description</td><td><p>{$param.D_DispDescription2}</p></td></tr>
<tr><td>ORG商品説明</td><td><p>{$param.description}</p></td></tr>
<tr><td>表示商品説明</td><td><p>{$param.D_DispDescription}</p></td></tr>
<tr><td>状況</td>
<td>
{if $param.status==1} 有効
{elseif $param.status==2} 待機
{elseif $param.status==0} 無効
{/if}
</td></tr>
</table>
<div class="submit_form">
<input type="submit" value="　更　新　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="DispKeyword" value="{$param.DispKeyword}">
<input type="hidden" name="DispDescription2" value="{$param.DispDescription2}">
<input type="hidden" name="DispDescription" value="{$param.DispDescription}">
<input type="hidden" name="status" value="{$param.status}">
</form> 
<form action="/manageitem/upd1/" method="post">  
<input type="submit" name="back" value="　修　正　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="DispKeyword" value="{$param.DispKeyword}">
<input type="hidden" name="DispDescription2" value="{$param.DispDescription2}">
<input type="hidden" name="DispDescription" value="{$param.DispDescription}">
<input type="hidden" name="status" value="{$param.status}">  
{foreach from=$param.category_list key=k item=v}
<input type="hidden" name="cate_cd[]" value="{$v.cd}">
{/foreach}
</form>
<br>
<a href="/manageitem/">カテゴリトップへ戻る</a><br>
<a href="/manage/login/">管理画面トップ</a><br>
<a href="/manage/logout/">ログアウト</a><br>
</div><!-- main end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>

