function LikeThisArticle(){
    if(document.getElementById("likeBtn").innerHTML=='<i class="material-icons" aria-hidden="true">favorite</i>')
        document.getElementById("likeBtn").innerHTML='<i class="material-icons" aria-hidden="true">favorite_border</i>';
    else{
        document.getElementById("likeBtn").innerHTML='<i class="material-icons" aria-hidden="true">favorite</i>';
    }
}

function SaveThisArticle(){
    if(document.getElementById("saveBtn").innerHTML=='<i class="material-icons" aria-hidden="true">bookmark</i>')
        document.getElementById("saveBtn").innerHTML='<i class="material-icons" aria-hidden="true">bookmark_border</i>';
    else
        document.getElementById("saveBtn").innerHTML='<i class="material-icons" aria-hidden="true">bookmark</i>';
}