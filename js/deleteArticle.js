function deleteArticleById(articleId) {
    var data = new FormData();
    data.append("deleteId", articleId);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/deleteArticle.php");
    xhr.onload = function (){
        var resp = this.response;
        console.log(resp);
        if(resp){
            document.getElementById("art-"+articleId).remove();
        }
        else {
            console.log("non ce l'ho fatta");
        }
    };
    xhr.send(data);
    return false;
}