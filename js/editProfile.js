const editBtn = document.getElementById("editBtn")
const editForm = document.getElementById("profileEditForm")
const userInfoBlock = document.getElementById("user-info")

window.onload = function() {
    if(window.location.search){
        loadTextBox();
        replaceInputValues();
    } else {
        hideEditForm();
    }
}
/*
editForm.addEventListener('submit', e => {
    e.preventDefault();

    validForm = validateInputs();
    
    if(validForm)
        form.submit()
});
*/

function loadTextBox() {
    editForm.style.display = "block";
    editBtn.style.display = "none";
    userInfoBlock.style.display = "none";

    document.getElementById('username').value = "old username"
}

function hideEditForm(){
    editForm.style.display = "none";
    editBtn.style.display = "block";
    userInfoBlock.style.display = "block";
}

function replaceInputValues(){
    const queryUrl = window.location.search;
    var formData = getAllUrlParams(window.location.url) 
    //console.log(formData.firstname);
    //console.log(queryUrl);
    
    document.getElementById('firstname').value = formData.firstname
    lastnameInput = document.getElementById('lastname').value = formData.lastname
    emailInput = document.getElementById('email').value = formData.email
    
}

function getAllUrlParams(url) {

    // get query string from url (optional) or window
    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
  
    // we'll store the parameters here
    var obj = {};
  
    // if query string exists
    if (queryString) {
  
      // stuff after # is not part of query string, so get rid of it
      queryString = queryString.split('#')[0];
  
      // split our query string into its component parts
      var arr = queryString.split('&');
  
      for (var i = 0; i < arr.length; i++) {
        // separate the keys and the values
        var a = arr[i].split('=');
  
        // set parameter name and value (use 'true' if empty)
        var paramName = a[0];
        var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];
  
        // (optional) keep case consistent
        paramName = paramName.toLowerCase();
        if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();
  
        // if the paramName ends with square brackets, e.g. colors[] or colors[2]
        if (paramName.match(/\[(\d+)?\]$/)) {
  
          // create key if it doesn't exist
          var key = paramName.replace(/\[(\d+)?\]/, '');
          if (!obj[key]) obj[key] = [];
  
          // if it's an indexed array e.g. colors[2]
          if (paramName.match(/\[\d+\]$/)) {
            // get the index value and add the entry at the appropriate position
            var index = /\[(\d+)\]/.exec(paramName)[1];
            obj[key][index] = paramValue;
          } else {
            // otherwise add the value to the end of the array
            obj[key].push(paramValue);
          }
        } else {
          // we're dealing with a string
          if (!obj[paramName]) {
            // if it doesn't exist, create property
            obj[paramName] = paramValue;
          } else if (obj[paramName] && typeof obj[paramName] === 'string'){
            // if property does exist and it's a string, convert it to an array
            obj[paramName] = [obj[paramName]];
            obj[paramName].push(paramValue);
          } else {
            // otherwise add the property
            obj[paramName].push(paramValue);
          }
        }
      }
    }
  
    return obj;
  }