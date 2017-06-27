<?php

session_start();
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error!";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
    echo $_SESSION["chk_ssid"];
}

//1.  DB接続します
try {
//    $pdo = new PDO('mysql:dbname=f-akifumi_gs_db;charset=utf8;host=mysql612.db.sakura.ne.jp','f-akifumi','akifumi0829');
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示 リンクと削除をここでしている。
$view=""; //文字列を入れるための空っぽの変数
if($status==false){
  //execute（SQL実行時にエラーがある場合.eroorが出来ない場合はelseが動き出す）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .=
//        "<p>".$result["booktitle"].",".$result["url"].",".$result["impression"].",".$result["datetime"]."</p>";
      $view .= "<p>";
      $view .= '<a href="u_view.php?id='.$result["id"].'">';
      //上記は左下にidが振られる
      $view .= $result["user_name"].":".$result["user_id"];
      //リンクの表示がブックタイトルと感想になる。もし他に表示を追加したい場合は上記に記入を追記する必要がある。
      $view .='</a>';
      $view .='　';
      $view .= '<a href="delete.php?id='.$result["id"].'">';
      $view .='[削除]';
      $view .='</a>';
      $view .="</p>";
  }
//本のタイトルとurl、感想、日時を表示するようにした。
//データベースに入っているだけのデータを表示するにはどうすればいいのか。データ表示の部分をそれぞれにする必要がある。
    
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザーの一覧</title>
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
      <a class="navbar-brand" href="login.html">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>