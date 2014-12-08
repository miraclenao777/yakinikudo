{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">

<div id="main">
<h2>○○のＢ級スポット情報</h2>
<table width="580" border="1">
    <tr>
        <td width="40" align="center">CD</td>
        <td width="240" align="left">名前</td>        
        <td width="80" align="center">更新日</td>
        <td width="160" align="center">操作</td>        
    </tr> 
{foreach from=$param.item key=k item=v}    
    <tr>
        <td align="center">{$v.cd}</td>
        <td align="left">{$v.name}</td>        
        <td align="center">{$v.timestamp}</td>
        <td align="center">
<a href="/tools/spotupd1/cd/{$v.cd}/">更新/削除</a>
<a href="/tools/spotimg1/cd/{$v.cd}/">画像</a>
        </td>
    </tr>
{foreachelse}
    <tr>
        <td width="500" colspan="3" align="center"><p>データなし</p></td>
    </tr>
{/foreach} 
</table>
<a href="/tools/spotins1">新規登録</a><br>
<a href="/tools/">管理画面トップへ</a><br>
</div><!-- main end -->


</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>