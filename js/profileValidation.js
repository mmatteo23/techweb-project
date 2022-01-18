const form = document.getElementById('form');
const username = document.getElementById('username');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('repeated_password');
const updateBtn = document.getElementById('saveBtn');
const deleteBtn = document.getElementById('deleteBtn');
/*
form.addEventListener('submit', e => {
    e.preventDefault();

    validForm = validateInputs();
    
    if(validForm)
        form.submit()
});
*/

// deleteBtn.addEventListener('click', e => {
//     const choice = window.confirm("Are you sure? From this point you can't come back :)");
    
//     if(choice){
//         console.log("delete")
//         deleteBtn.click
//     }
//     else {
//         console.log("annulla")
//         e.preventDefault();
//     }
//     //alert("Are you sure? From this point you can't come back :)");
// });

updateBtn.addEventListener('click', e => {
    e.preventDefault();

    validForm = validateInputs();
    
    if(validForm)
        form.submit()
});

function validateImage() {
    const fileInput = document.getElementById('profile_img')
    var file = document.getElementById("profile_img").files[0];

    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        //alert('Please select a valid image file');
        setError(fileInput, 'Please select a valid image file')
        document.getElementById("profile_img").value = '';
        return false;
    }

    setSuccess(fileInput)
    return true;
}

function showPreview(event){
    if(event.target.files.length > 0 && validateImage()){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("user-profile-img");
        preview.src = src;
        preview.style.display = "block";
    }
}

const setError = (element, message) => {
    const inputWrapper = element.parentElement;
    const errorDisplay = inputWrapper.querySelector('.error');

    errorDisplay.innerText = message;
    inputWrapper.classList.add('error');
    inputWrapper.classList.remove('success');
}

const setSuccess = element => {
    const inputWrapper = element.parentElement;
    const errorDisplay = inputWrapper.querySelector('.error');

    errorDisplay.innerText = '';
    inputWrapper.classList.add('success');
    inputWrapper.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const isValidName = name => {
    const re = /^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/;
    return re.test(String(name).toLowerCase());
}

function validateInputs () {
    const usernameValue = username.value.trim();    // trim remove white space
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value;
    const emailValue = email.value;
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    var validForm = true

    if(usernameValue === '') {
        setError(username, 'Username is required')
        validForm = false
    } else {
        setSuccess(username)
    }

    if(firstnameValue === '') {
        setError(firstname, 'Firstname is required')
        validForm = false
    } else if (!isValidName(firstnameValue)) {
        setError(firstname, 'Provide a valid firstname')
        validForm = false
    } else {
        setSuccess(firstname)
    }

    if(lastnameValue === '') {
        setError(lastname, 'Lastname is required')
        validForm = false
    } else if (!isValidName(lastnameValue)) {
        setError(lastname, 'Provide a valid lastname')
        validForm = false
    } else {
        setSuccess(lastname)
    }

    if(emailValue === '') {
        setError(email, 'Email is required')
        validForm = false
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address')
        validForm = false
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required')
        validForm = false
    } else if (passwordValue.length < 4) {
        setError(password, 'Password must be at least 4 characters.')
        validForm = false
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password')
        validForm = false
    } else if (password2Value !== passwordValue) {
        setError(password2, 'Password doesn\'t match.')
        validForm = false
    } else {
        setSuccess(password2);
    }

    return validForm
}