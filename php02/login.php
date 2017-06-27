<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="sign_up.php">新規会員登録</a>
    <a class="navbar-brand" href="select01.php">ログイン</a>
    <a class="navbar-brand" href="login.php">ログアウト</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>IDとPASSWORDを入力してね</legend>
     <label>ID：  <input type="text" name="lid" placeholder="id"></label><br>
     <label>PSAA：<input type="text" name="lpw" placeholder="pass"></label><br>
     <input type="submit" value="ログイン">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<form method="post" action="insert02.php">
<!-- 上記のファイルを別のものに変える必要がある-->
  <div class="jumbotron">
   <fieldset>
    <legend>新規会員登録</legend>
    <label>面白いユーザー名にしてね：<input type="text" name="user_name">
<!--     上記のnameを変更する必要がある-->
     </label><br>
     <label>IDの入力：<input type="text" name="user_id">
<!--     上記のnameを変更する必要がある-->
     </label><br>
     <label>PASS：<input type="text" name="pass">
<!--     上記のnameを変更する必要がある-->
     </label><br>
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


</body>
</html>






