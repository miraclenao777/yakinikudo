{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">

<div id="main">
カテゴリ情報の登録が完了しました。
<br><br>
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