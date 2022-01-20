const form = document.getElementById('form');
const username = document.getElementById('username');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('repeated_password');

form.addEventListener('submit', e => {
    e.preventDefault();

     validForm = validateInputs();
    
    if(validForm)
        form.submit()
});

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

function validateUsername(){
    const usernameValue = username.value.trim();    // trim remove white space
    var validForm = true;    
    if(usernameValue === '') {
        setError(username, 'Username is required')
        validForm = false
    } else {
        setSuccess(username)
    }

    return validForm
}

function validateFirstName(){
    const firstnameValue = firstname.value.trim();    // trim remove white space
    var validForm = true;    
    if(firstnameValue === '') {
        setError(firstname, 'Firstname is required')
        validForm = false
    } else if (!isValidName(firstnameValue)) {
        setError(firstname, 'Provide a valid firstname')
        validForm = false
    } else {
        setSuccess(firstname)
    }

    return validForm
}

function validateLastName(){
    const lastnameValue = lastname.value;
    var validForm = true;
    if(lastnameValue === '') {
        setError(lastname, 'Lastname is required')
        validForm = false
    } else if (!isValidName(lastnameValue)) {
        setError(lastname, 'Provide a valid lastname')
        validForm = false
    } else {
        setSuccess(lastname)
    }

    return validForm
}

function validateEmail(){
    const emailValue = email.value;
    var validForm = true;
    if(emailValue === '') {
        setError(email, 'Email is required')
        validForm = false
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address')
        validForm = false
    } else {
        setSuccess(email);
    }

    return validForm
}

function validatePassword(){
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    var validForm = true;
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
        setError(password2, 'Passwords doesn\'t match.')
        validForm = false
    } else {
        setSuccess(password2);
    }

    return validForm
}

// function validatePassword2(){    
//     var validForm = true;    
//     return validForm
// }

function validateInputs () {    

    var validForm = true
 
    validForm = (validForm & validateUsername())
    validForm = (validForm & validateFirstName())
    validForm = (validForm & validateLastName())
    validForm = (validForm & validateEmail())
    validForm = (validForm & validatePassword())
    // validForm = (validForm & validatePassword2())

    return validForm
}