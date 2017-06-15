<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本をブックマークする課題だよー</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select01.php">お気に入りの本一覧</a></div>
<!--    上記のファイルを別のものに変える必要がある-->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert01.php">
<!-- 上記のファイルを別のものに変える必要がある-->
  <div class="jumbotron">
   <fieldset>
    <legend>お気に入りの本を教えて！！</legend>
     <label>書籍名：<input type="text" name="booktitle">
<!--     上記のnameを変更する必要がある-->
     </label><br>
     <label>書籍URL：<input type="text" name="url">
<!--     上記のnameを変更する必要がある-->
     </label><br>
     <label>コメント<textArea name="impression" rows="4" cols="40"></textArea>
<!--     上記のnameを変更する必要がある-->
     </label><br>
<!--登録日時は手動で入力する必要が今回はない。予約が必要であった       り、登録日時を捏造したい場合につければよい。今回は自動でデータ     がはいってくれる。
     <label>登録日時<input type="date" name="datetime">
     </label><br>
-->
<!--     上記のname、type属性（日時似合わせる）を変更する必要がある-->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
