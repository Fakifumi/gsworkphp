//$(function(){
//    $("#btn").on("click", function(){
//        $.ajax({
//            url:"https://www.googleapis.com/books/v1/volumes?q=【ここに書籍名】"
//        })
//        
//    });
//});



$("#btn").on("click", function(){
var val= $("#booksearch").val();
$.getJSON(
"https://www.googleapis.com/books/v1/volumes?q= "+val,
    function(data){
        console.dir(data);
    
    
    var view = "";
    for(var i=0; i<data.items.length; i++){
        var item = data.items[i];
        view += "<ul>";
        view += "<li>題名： "+item.volumeInfo.title + "</li>";
        view += "<li>URL : "+item.volumeInfo.canonicalVolumeLink
 + "</li>";
        view += "</ul>";
    }    
        
        
        
    $("#content").html(view);
    }

);
});