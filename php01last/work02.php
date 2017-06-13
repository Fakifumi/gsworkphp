<?php

$name = $_POST["name"];
$email = $_POST["email"];
$fruit = $_POST['fruit']."<br>";

echo $name;
echo $email;
echo $fruit;

 $file = fopen("data/data.txt", "a");
fwrite($file,$name. "," .$email. ",".$fruit);
fclose($file);
?>


<!--ここからdata.txtに保存したデータを表示するようにする。-->
<?php

//ファイルを変数に格納
$filename = 'data/data.txt';

//fopenでファイルを開く('r'は読み込みモードで開く)
$fp = fopen($filename,'r');

//whileで行末までループ処理を行う
while(!feof($fp)){
    
    
    //fgetsでファイルを読み込み、変数に格納
    $txt = fgets($fp);
    
    //ファイルを読み込んだ変数を出力
    echo $txt.'<br>';
}

//fcloseでファイルを閉じる
fclose($fp);




?>