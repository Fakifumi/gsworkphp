<?php

session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//Session変数はサーバー側で変数をもっていて、ページが変わっても同じ値を持っていることが出来る。

//2. DB接続します
try {
//  $pdo = new PDO('mysql:dbname=f-akifumi_gs_db;charset=utf8;host=mysql612.db.sakura.ne.jp','f-akifumi','akifumi0829');
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE user_id=:lid AND pass =:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}
   $result = $stmt->fetch();//$result["id"];これだけで一行取得することが出来る

  //該当レコードがあればsessionに値を代入
if( $result["id"] !=""){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["user_name"] = $result['user_name'];
    //login処理okの場合select01.phpへ遷移
    header("Location: select01.php");
}else{
    //Login処理NGの場合はlogin.phpへ遷移。ここで間違えてますよ的な文言を表示すると親切かな
    header("Location: login.php");
}
//処理終了
exit();
?>

