<?php

//1.GETでidを取得
$id = $_GET["id"];
//select01.phpでidが送られてくるのでidを取得する必要がある。3.データ表示のところにある



//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id, PDO::PARAM_INT);
//★ここまだ記入出来てない
$status = $stmt->execute();
//エラーが起きた際に上の変数が起動する


//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //whileループでは1データのみの抽出を行えない。
    $result = $stmt->fetch();
}

?>







<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select01.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>アンケート</legend>
     <label>書籍名:<input type="text" name="booktitle" value="<?=$result["booktitle"]?>"></label><br>
     <label>書籍URL:<input type="text" name="url" value="<?=$result["url"]?>"></label><br>
     <label>コメント<textArea name="impression" rows="4" cols="40">
     <?=$result["impression"]?>
     </textArea></label><br>
<!--     テキストの場合書き方が違うよ！！-->
     <input type="hidden" name="id" value="<?=$id?>">
<!--     隠してページにデータをもっておく-->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
