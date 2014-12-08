{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="tools">
Ｂ級スポット 更新（入力）<br>
{if $param.errmsg}
<div id="errmsg">
{$param.errmsg}
</div>
{/if}
<table>
<form action="/tools/spotupd2/" method="post">
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
  <th>都道府県</td>
  <td>  
<select name="pref_cd">  
{foreach from=$param.pref key=k item=v}
<option value="{$k}"{if $param.pref_cd==$k} SELECTED{/if}>{$v.name}</option> 
{/foreach}
</select>
  </td>
 </tr>
<!-- 
 <tr>
  <th>カテゴリ</td>
  <td>
<select name="category">  
<option value="0">その他</option> 
</select>  
  </td>
 </tr>
--> 
 <tr>
  <th>所在地</td>
  <td>
   <input type="text" name="address" value="{$param.address}" size="60">
  </td>
 </tr> 
 <tr>
  <th>見出し</td>
  <td>
   <input type="text" name="topic" value="{$param.topic}" size="60">
  </td>
 </tr> 
 <tr>
  <th>コメント</td>
  <td>
   <textarea name="comment" rows="5" cols="50">{$param.comment}</textarea>
  </td>
 </tr>
 <tr>
  <th>ＵＲＬ</td>
  <td>
   <input type="text" name="url" value="{$param.url}" size="60">
  </td>
 </tr>
 <tr>
  <th>アクセス</td>
  <td>
   <input type="text" name="access" value="{$param.access}" size="60">
  </td>
 </tr>   
 <tr>
  <th>緯度</td>
  <td>
   <input type="text" name="latitude" value="{$param.latitude}" size="20">
  </td>
 </tr> 
 <tr>
  <th>経度</td>
  <td>
   <input type="text" name="longitude" value="{$param.longitude}" size="20">
  </td>
 </tr> 
 <tr>
  <th>ステータス</td>
  <td>
   <input type="radio" name="status_cd" value="1"{if $param.status_cd==1} CHECKED{/if}>正常
   <input type="radio" name="status_cd" value="2"{if $param.status_cd==2} CHECKED{/if}>確認中
   <input type="radio" name="status_cd" value="0"{if $param.status_cd==0} CHECKED{/if}>削除
  </td>
 </tr>  
</table>
<input type="hidden" name="cd" value="{$param.cd}">
<input type="submit" value="　更　新　">
</form>
<br>
<a href="/tools/spot">一覧画面へ</a>
<a href="/tools/">管理画面トップ</a><br>
</div><!-- main end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>