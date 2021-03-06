<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
//1.  DB接続します
function db_con(){
  try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    //★dbnameが変更する。できてない
        }   catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
        }
    return $pdo;
}




//SQL処理エラー
function qerror($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}


/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


?>
