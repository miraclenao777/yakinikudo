{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">

<div id="tools">
<h2>Ｂ級グルメ情報（画像）</h2>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}
<form action="/tools/gourmetimg2/" method="POST" ENCTYPE="MULTIPART/FORM-DATA">

<table width="580" border="1">
    <tr>
        <td width="60" align="center">CD</td>
        <td width="500" align="center">{$param.cd}</td>             
    </tr>    
    <tr>
        <td align="center">名前</td>
        <td align="left">{$param.name}</td>        
        </td>
    </tr>
    <tr>
        <td align="center">画像</td>
        <td align="center">
{if $param.img_flg==1}
<IMG SRC="/images/gourmet/{$param.cd}.jpg" width="{$param.width}" height="{$param.height}" alt="{$param.name}"><br>
<a href="/tools/gourmetimgunlink/cd/{$param.cd}/">画像を削除する。</a>
{else}
画像なし
{/if}       
        </td>        
        </td>
    </tr>      
    <tr>
        <td align="center">ファイル</td>
        <td align="left">
        <input type="file" name="img">        
        </td>        
    </tr>
      
</table>
<input type="hidden" name="cd" value="{$param.cd}">
<input type="submit" value="　保　存　">
</form>
<a href="/tools/gourmet">Ｂ級グルメ一覧</a>
<a href="/tools/">管理画面トップへ</a><br>
</div><!-- main end -->


</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>