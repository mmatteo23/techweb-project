async function postData(username, article, isLiked) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../php/ajaxLikeAndSave.php", true); 
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

function LikeThisArticle(username, article, isLiked) {
    console.log("PRIMA: " + isLiked);
    if (isLiked) {
        //se era liked adesso l'user vuole togliere il like
        isLiked = 0;
        document.getElementById("likeContainer").innerHTML='<span type="button" id="likeBtn" onclick=LikeThisArticle("'+username+'",'+article+','+isLiked+')><span class="material-icons md-36">favorite_border</span></span>';
        postData(username, article, isLiked);
    } else {
        //se non lo era allora vuole metterlo
        isLiked = 1;
        document.getElementById("likeContainer").innerHTML='<span type="button" id="likeBtn" onclick=LikeThisArticle("'+username+'",'+article+','+isLiked+')><span class="material-icons md-36">favorite</span></span>';
        postData(username, article, isLiked);
    }
    console.log("DOPO: " + isLiked);
}

function SaveThisArticle(username, article, isSaved) {
    console.log("PRIMA: " + isSaved);
    if (isSaved) {
        //se era liked adesso l'user vuole togliere il like
        isSaved = 0;
        document.getElementById("saveContainer").innerHTML='<span type="button" id="likeBtn" onclick=SaveThisArticle("'+username+'",'+article+','+isSaved+')><span class="material-icons md-36">bookmark_border</span></span>';
        //postData(username, article, isSaved);
    } else {
        //se non lo era allora vuole metterlo
        isSaved = 1;
        document.getElementById("saveContainer").innerHTML='<span type="button" id="saveBtn" onclick=SaveThisArticle("'+username+'",'+article+','+isSaved+')><span class="material-icons md-36">bookmark</span></span>';
        //postData(username, article, isSaved);
    }
    console.log("DOPO: " + isSaved);
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