<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題だよ−−</title>
</head>
<body>

<!--ここにデータ登録を行う-->

<form method="POST" action="work02.php">
   <p>お名前:<input type="text" name="name" size="20"></p>
   <p>EMAIL:<input type="text" name="email" size="20"></p>
   
   
   
   <p>好きなフルーツはなんですか？<br>
<!--    valueに名前を入れたけどこれでいいのか？？  -->
       <input type="radio" name="fruit" value="リンゴ">リンゴ<br>
       <input type="radio" name="fruit" value="バナナ">バナナ<br>
       <input type="radio" name="fruit" value="イチゴ">イチゴ<br>
       <input type="radio" name="fruit" value="スイカ">スイカ<br>
       <input type="radio" name="fruit" value="温州みかん">温州みかん<br>
    </p>
   <p><input type="submit" value="送信" id="get1"></p>
  
  
   
   
   <!-- JSONデータを表示 -->
<table id="data"></table>
<tr><th>名前</th><th>email</th><th>果物</th></tr>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script>
$("#get1").on("click",function(){
    //JSON取得
    $.getJSON("output_data.php",function(data) {
        console.log(data);
        //DATA数ループ処理
        $("#data")//.empty();
        for(val in data){
            //表示HTML作成
            var td = "<tr>";
                td += "<td>"+data[val][0]+"</td>";
                td += "<td>"+data[val][1]+"</td>";
                td += "<td>"+data[val][2]+"</td>";
                td += "</tr>";
            //文字作成後にid="data"に追加
            $("#data").append(td);
        }
    });
});
   
</script>

    
</form>

<!--ここにデータ登録を行う-->