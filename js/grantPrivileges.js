async function postData(username, role) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../php/ajaxGrantPrivileges.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         var response = this.responseText;
       }
    };
    var data = {username: username, role: role};
    xhttp.send(JSON.stringify(data));
    console.log("JSON sent");
}

const form = document.getElementById("privilegesForm");

form.addEventListener('submit', e => {
    e.preventDefault();
    var userList= document.getElementById("user");
    var selectedUser = user.options[user.selectedIndex];
    if(typeof selectedUser !== 'undefined'){
        userList.removeChild(selectedUser);  
    }   

    //console.log(selectedUser.value);
    var data = new FormData();
    data.append("username", selectedUser.value);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/ajaxGrantPrivileges.php");
    xhr.onload = function (){
        console.log(this.response);
    };
    xhr.send(data);
    
    return false;
});