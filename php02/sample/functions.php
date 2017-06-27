<?php
//共通で使うものを別ファイルにしておきましょう。

//XSS対応
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}




function loginCheck(){}
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error!";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
    echo $_SESSION["chk_ssid"];
}


?>