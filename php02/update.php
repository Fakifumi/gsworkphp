<?php
//1.POSTでParamを取得
$id          = $_POST["id"];
$booktitle   = $_POST["booktitle"];
$url         = $_POST["url"];
$impression  = $_POST["impression"];


//2.DB接続など
try {
//  $pdo = new PDO('mysql:dbname=f-akifumi_gs_db;charset=utf8;host=mysql612.db.sakura.ne.jp','f-akifumi','akifumi0829');
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    //★dbnameが変更する。できてない
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_bm_table SET booktitle=:booktitle,url=:url,impression=:impression WHERE id=:id");
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':booktitle',   $booktitle,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',  $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':impression', $impression, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  header("Location: select01.php");
  exit;
}



?>
