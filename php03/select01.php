<?php
//0.外部ファイル読み込み
include("functions.php");
$pdo = db_con();

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    //★dbnameが変更する。できてない
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成(gs_an_table)
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
//★ここまだ記入出来てない
$status = $stmt->execute();
//エラーが起きた際に上の変数が起動する

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>';
    $view .= '<a href="detail01.php?id='.h($result["id"]).'">';
      //★上は何をしているのか？？上の?はここまでがurlという記号だよ。左側がurl右側がデータだよ。
    $view .= h($result["id"])."[".h($result["name"])."]";
    $view .='</a>';
    $view .='　';
    $view .= '<a href="delete01.php?id='.h($result["id"]).'">';
      //ここは削除する処理を行うよ！！
    $view .= "[削除]";
    $view .='</a>';
    $view .='</p>';
      //★上は閉じタグ
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index01.php">データ登録</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
