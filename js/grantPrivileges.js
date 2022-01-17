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