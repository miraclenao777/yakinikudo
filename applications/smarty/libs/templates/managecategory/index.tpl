{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="main">
<h2>カテゴリ</h2>
<a href="/managecategory/ins1/category_cd/0/">新規登録</a><br>
<table width="580" border="1">
    <tr>
        <td width="40" align="center">CD</td>
        <td width="300" align="left">名前</td> 
        <td width="80" align="left">状況</td>      
        <td width="80" align="left">更新日</td>
    </tr>
{foreach from=$param.item key=k item=v}    
    <tr>
        <td align="center"><a href="/managecategory/category/cd/{$v.cd}/">{$v.cd}</a></td>
        <td align="left"><a href="/managecategory/upd1/category_cd/0/cd/{$v.cd}/">{$v.name}</a></td>   
        <td align="center">{if $v.status==1}有効{else}無効{/if}</td>
        <td align="center">{$v.timestamp}</td>
    </tr>
{foreachelse}
    <tr>
        <td width="500" colspan="3" align="center"><p>データなし</p></td>
    </tr>
{/foreach} 
</table>
<a href="/manage/login/">管理画面トップ</a><br>
<a href="/manage/logout/">ログアウト</a><br>
</div><!-- main end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>