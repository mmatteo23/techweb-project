async function postData(username, article, isLiked) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/ajaxLikeAndSave.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         var response = this.responseText;
       }
    };
    var data = {username: username, article_id: article, like: isLiked};
    xhttp.send(JSON.stringify(data));
    console.log("JSON sent");
}
/*
async function LikeThisArticle(username, article, isLiked) {
    if (isLiked) {
        //se era liked adesso l'user vuole togliere il like
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite_border</span>';
        postData(username, article);
    } else {
        //se non lo era allora vuole metterlo
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite</span>';
        postData(username, article);
    }
}

async function SaveThisArticle(username, article, isSaved) {
    if (isSaved) {
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark</span>';
        postData(username, article);
    } else {
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark_border</span>';
        postData(username, article);
    }
}
*/

// ---------------- DEBUG FUNCTION ---------------- //
/*ROBA DI CASONATO
function LikeThisArticle(username, article, isLiked) {
    console.log("PRIMA: " + isLiked);
    if (isLiked) {
        //se era liked adesso l'user vuole togliere il like
        isLiked = 0;
        document.getElementById("likeContainer").innerHTML='<button id="likeBtn" onclick=LikeThisArticle("'+username+'",'+article+','+isLiked+')><span class="material-icons md-36">favorite_border</span></button>';
        postData(username, article, isLiked);
    } else {
        //se non lo era allora vuole metterlo
        isLiked = 1;
        document.getElementById("likeContainer").innerHTML='<button id="likeBtn" onclick=LikeThisArticle("'+username+'",'+article+','+isLiked+')><span class="material-icons md-36">favorite</span></button>';
        postData(username, article, isLiked);
    }
    console.log("DOPO: " + isLiked);
}

function SaveThisArticle(username, article, isSaved) {
    console.log("PRIMA: " + isSaved);
    if (isSaved) {
        //se era liked adesso l'user vuole togliere il like
        isSaved = 0;
        document.getElementById("saveContainer").innerHTML='<button id="likeBtn" onclick=SaveThisArticle("'+username+'",'+article+','+isSaved+')><span class="material-icons md-36">bookmark_border</span></button>';
        //postData(username, article, isSaved);
    } else {
        //se non lo era allora vuole metterlo
        isSaved = 1;
        document.getElementById("saveContainer").innerHTML='<button id="saveBtn" onclick=SaveThisArticle("'+username+'",'+article+','+isSaved+')><span class="material-icons md-36">bookmark</span></button>';
        //postData(username, article, isSaved);
    }
    console.log("DOPO: " + isSaved);
}
FINE ROBA DI CASONATO*/

function LikeThisArticle(username, id, liked){
    var likes=((document.getElementById("article-likes").innerHTML).split(" likes")[0]).substring(70);
    if(liked){          //sta togliendo il like
        liked=0;
        document.getElementById("likeContainer").innerHTML='<button id="likeBtn" onclick=LikeThisArticle("'+username+'",'+id+','+liked+')><span class="material-icons md-36">favorite_border</span></button>';
        likes--;
    }
    else{
        liked=1;
        document.getElementById("likeContainer").innerHTML='<button id="likeBtn" onclick=LikeThisArticle("'+username+'",'+id+','+liked+')><span class="material-icons md-36">favorite</span></button>';
        likes++;
    }
    document.getElementById("article-likes").innerHTML='<i class="material-icons" aria-hidden="true">favorite_border</i><span>'+likes+' likes</span>';
    var data = new FormData();
    data.append("username", username);
    data.append("articleId", id);
    data.append("newState", liked);
    data.append("table", "like");
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/change_like_or_save_state.php");
    xhr.onload = function (){
        console.log(this.response);
    };
    xhr.send(data);
    return false;
}

function SaveThisArticle(username, id, saved){
    if(saved){          //sta togliendo il like
        saved=0;
        document.getElementById("saveContainer").innerHTML='<button id="saveBtn" onclick=SaveThisArticle("'+username+'",'+id+','+saved+')><span class="material-icons md-36">bookmark_border</span></button>';
    }
    else{
        saved=1;
        document.getElementById("saveContainer").innerHTML='<button id="saveBtn" onclick=SaveThisArticle("'+username+'",'+id+','+saved+')><span class="material-icons md-36">bookmark</span></button>';
    }
    var data = new FormData();
    data.append("username", username);
    data.append("articleId", id);
    data.append("newState", saved);
    data.append("table", "save");
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/change_like_or_save_state.php");
    xhr.onload = function (){
        console.log(this.response);
    };
    xhr.send(data);
    return false;
}

/*
function LikeThisArticle(isLiked){
    if(document.getElementById("likeBtn").innerHTML=='<span class="material-icons md-36">favorite</span>')
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite_border</span>';
    else{
        document.getElementById("likeBtn").innerHTML='<span class="material-icons md-36">favorite</span>';
    }
}

function SaveThisArticle(isSaved){
    if(document.getElementById("saveBtn").innerHTML=='<span class="material-icons md-36">bookmark</span>')
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark_border</span>';
    else
        document.getElementById("saveBtn").innerHTML='<span class="material-icons md-36">bookmark</span>';
}
*/