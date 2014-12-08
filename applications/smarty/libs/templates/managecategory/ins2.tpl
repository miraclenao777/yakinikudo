{include file='index/head.tpl'}
{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="main">
カテゴリ　新規登録（確認）<br>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}
カテゴリ：{$param.category.name}
<table>
<form action="/managecategory/ins3/" method="post">
 <tr>
  <th width="90">名前</td>
  <td width="440">
   {$param.name}
  </td>
 </tr>
</table>
<div class="submit_form">
<input type="submit" value="　登　録　">
<input type="hidden" name="name" value="{$param.name}">
<input type="hidden" name="category_cd" value="{$param.category.cd}" size="40">
</form> 
<form action="/managecategory/ins1/" method="post">  
<input type="submit" value="　修　正　">
<input type="hidden" name="name" value="{$param.name}">  
<input type="hidden" name="category_cd" value="{$param.category.cd}" size="40">
</form>
<br>
<a href="/managecategory/">珍品堂カテゴリトップへ戻る</a><br>
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