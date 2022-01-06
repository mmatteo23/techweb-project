function LikeThisArticle(){
    if(document.getElementById("likeBtn").innerHTML=='<span class="material-icons md-36">favorite</span>')
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite_border</span>';
    else{
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite</span>';
    }
}

function SaveThisArticle(){
    if(document.getElementById("saveBtn").innerHTML=='<span class="material-icons md-36">bookmark</span>')
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark_border</span>';
    else
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark</span>';
}