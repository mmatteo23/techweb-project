function loadMore(lastArticleLoaded) {
    //con AJAX
    var data = new FormData();
    data.append("lastArticle", lastArticleLoaded);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/loadMoreArticles.php");
    xhr.onload = function (){
        var html_to_append = this.response;
        document.getElementById("latest-articles").innerHTML=(document.getElementById("latest-articles").innerHTML).split('<button class="action-button" ')[0]+html_to_append;
        var newArticleLink = ((html_to_append.split(' href="')[1]).split('">'))[0];
        console.log(newArticleLink);
        document.querySelector("a[href='" + newArticleLink + "']").focus();
    };
    xhr.send(data);
    return false;
}