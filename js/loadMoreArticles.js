function loadMore(lastArticleLoaded) {
//--cookie che scade tra un'ora------
    /*var now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    document.cookie = "lastArticleLoaded=" + lastArticleLoaded + "; expires=" + now.toUTCString() + "; path=/";
    document.location.reload(true);*/

    //con AJAX
    var data = new FormData();
    data.append("lastArticle", lastArticleLoaded);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/loadMoreArticles.php");
    xhr.onload = function (){
        var html_to_append = this.response;
        document.getElementById("latest-articles").innerHTML=(document.getElementById("latest-articles").innerHTML).split('<button class="action-button" ')[0]+html_to_append;
    };
    xhr.send(data);
    return false;
}