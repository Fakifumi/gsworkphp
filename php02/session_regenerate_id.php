<?php
//必ずsession_startは最初に記述
session_start();

//現在のSessionIDを取得
$old_sessionid = session_id();

//新しいSessionIDを発行（前のsessionIDは無効）
session_regenerate_id(true);

//新しいSessionIDを取得
$new_sessionid = session_id();

//旧SessionIDと新SessionIDを表示
echo "古いSession: $old_sessionid<br />";
echo "新しいSession: $new_sessionid<br />";

?>