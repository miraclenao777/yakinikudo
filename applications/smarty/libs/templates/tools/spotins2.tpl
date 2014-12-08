{include file='index/head.tpl'}
<body>
<div id="bg">
<div id="container">
<div id="tools">
Ｂ級スポット<br>
<table>
<form action="/tools/spotins3/" method="post">
 <tr>
  <th width="90">名前</th>
  <td width="440">
{$param.name}
  </td>
 </tr>
 <tr>
  <th>都道府県</th>
  <td>   
{$param.pref_name}
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
  <th>所在地</th>
  <td>
   {$param.address}
  </td>
 </tr> 
 <tr>
  <th>見出し</th>
  <td>
   {$param.topic}
  </td>
 </tr> 
 <tr>
  <th>コメント</th>
  <td>
{$param.comment_disp}
  </td>
 </tr>
 <tr>
  <th>ＵＲＬ</th>
  <td>
   {$param.url}
  </td>
 </tr>  
 <tr>
  <th>アクセス</th>
  <td>
   {$param.access}
  </td>
 </tr> 
 <tr>
  <th>緯度</th>
  <td>
   {$param.latitude}
  </td>
 </tr> 
 <tr>
  <th>経度</th>
  <td>
   {$param.longitude}
  </td>
 </tr> 
 <tr>
  <th>ステータス</th>
  <td>
  {$param.status_name}
  </td>
 </tr>  
</table>
<br><br>
<div class="submit_form">
<input type="submit" value="　登　録　">
<input type="hidden" name="name" value="{$param.name}">
<input type="hidden" name="pref_cd" value="{$param.pref_cd}">
<input type="hidden" name="address" value="{$param.address}">
<input type="hidden" name="topic" value="{$param.topic}">
<input type="hidden" name="comment" value="{$param.comment}">
<input type="hidden" name="url" value="{$param.url}">
<input type="hidden" name="access" value="{$param.access}">
<input type="hidden" name="latitude" value="{$param.latitude}">
<input type="hidden" name="longitude" value="{$param.longitude}">
<input type="hidden" name="status_cd" value="{$param.status_cd}">
</form> 
<form action="/tools/spotins1/" method="post">  
<input type="submit" value="　修　正　">
<input type="hidden" name="name" value="{$param.name}">
<input type="hidden" name="pref_cd" value="{$param.pref_cd}">
<input type="hidden" name="address" value="{$param.address}">
<input type="hidden" name="topic" value="{$param.topic}">
<input type="hidden" name="comment" value="{$param.comment}">
<input type="hidden" name="url" value="{$param.url}">
<input type="hidden" name="access" value="{$param.access}">
<input type="hidden" name="latitude" value="{$param.latitude}">
<input type="hidden" name="longitude" value="{$param.longitude}">
<input type="hidden" name="status_cd" value="{$param.status_cd}"> 

</form>   
</div>


<br>
<a href="/tools/spot/">一覧画面へ</a>
<a href="/tools/">管理画面トップ</a><br>
</div><!-- main end -->
</div><!-- container end -->
</div><!-- bg end -->
</body>
</html>