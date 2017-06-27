<?php

//1. POSTデータ取得
$user_name = $_POST["user_name"];
$user_id  = $_POST["user_id"];
$pass        = $_POST["pass"];






//2. DB接続します
try {
//  $pdo = new PDO('mysql:dbname=f-akifumi_gs_db;charset=utf8;host=mysql612.db.sakura.ne.jp','f-akifumi','akifumi0829');
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, user_name, user_id, pass, life_flag, indate )VALUES(NULL, :user_name, :user_id, :pass, :life_flag, sysdate())");

$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flag', 1, PDO::PARAM_INT); 
//$life_flagは1にしてあり、退会時の値をゼロにしてあげるといいよ！！
//Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select02.php");
  exit;

}