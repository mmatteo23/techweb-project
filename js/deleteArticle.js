function deleteArticleById(articleId) {
    var data = new FormData();
    data.append("deleteId", articleId);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/deleteArticle.php");
    xhr.onload = function (){
        var resp = this.response;
        if(resp){
            document.getElementById("art-"+articleId).remove();
            hideModal();
        }
    };
    xhr.send(data);
    return false;
}

function showModal(articleId) {
    var box = document.getElementById('delete-box');
    var backdrop = document.getElementById('backdrop');
    box.style.display = 'flex';
    backdrop.style.display = 'block';
    var cancelDelete = document.getElementById('cancelDelete');
    cancelDelete.focus();
    var confirmDelete = document.getElementById('confirmDelete');
    confirmDelete.setAttribute('onClick', 'deleteArticleById('+articleId+')');
}

function hideModal() {
    var box = document.getElementById('delete-box');
    var backdrop = document.getElementById('backdrop');
    box.style.display = 'none';
    backdrop.style.display = 'none';
}