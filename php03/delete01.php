<?php

$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    //★dbnameが変更する。できてない
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
//セレクトをデリートに変更したよ。
$stmt->bindValue(":id",$id, PDO::PARAM_INT);
//★ここまだ記入出来てない
$status = $stmt->execute();
//エラーが起きた際に上の変数が起動する

//Eroor確認＆リダイレクト
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  header("Location: select.php");
  exit;
}







?>