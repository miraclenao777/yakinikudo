{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="main">
カテゴリ　更新（確認「）<br>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}
カテゴリ：{$param.category.name}
<table>
<form action="/managecategory/upd3/" method="post">
 <tr>
  <th width="90">ＣＤ</td>
  <td width="440">
   {$param.cd}
  </td>
 </tr>
 <tr>
  <th width="90">名前</td>
  <td width="440">
   {$param.name}
  </td>
 </tr>
 <tr>
  <th width="90">状況</td>
  <td width="440">
   {if $param.status==1}有効{else}無効{/if}
  </td>
 </tr> 
</table>
<div class="submit_form">
<input type="submit" value="　登　録　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="name" value="{$param.name}">
<input type="hidden" name="status" value="{$param.status}">
<input type="hidden" name="category_cd" value="{$param.category.cd}">
</form> 
<form action="/managecategory/upd1/" method="post">  
<input type="submit" name="back" value="　修　正　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="name" value="{$param.name}"> 
<input type="hidden" name="status" value="{$param.status}">  
<input type="hidden" name="category_cd" value="{$param.category.cd}">
</form>
<br>
<a href="/managecategory/">カテゴリトップへ戻る</a><br>
{if $param.category.cd!=0}
<a href="/managecategory/category/cd/{$param.category.cd}/">{$param.category.name}へ戻る</a><br>
{/if}
<a href="/manage/login/">管理画面トップ</a><br>
<a href="/manage/logout/">ログアウト</a><br>
</div><!-- main end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>

