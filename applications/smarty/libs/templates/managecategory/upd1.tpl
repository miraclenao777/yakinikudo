{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="main">
カテゴリ　更新（入力）<br>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}
<table>
<form action="/managecategory/upd2/" method="post">
 <tr>
  <th width="90">ＣＤ</td>
  <td width="440">
   {$param.cd}
  </td>
 </tr>
 <tr>
  <th width="90">名前</td>
  <td width="440">
   <input type="text" name="name" value="{$param.name}" size="40">
  </td>
 </tr>
 <tr>
  <th width="90">状況</td>
  <td width="440">
   <input type="radio" name="status" value="1"{if $param.status==1} CHECKED{/if}>有効
   <input type="radio" name="status" value="0"{if $param.status!=1} CHECKED{/if}>無効
  </td>
 </tr> 
</table>
<input type="submit" value="　更　新　">
<input type="hidden" name="cd" value="{$param.cd}">
<input type="hidden" name="category_cd" value="{$param.category.cd}" size="40">
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
