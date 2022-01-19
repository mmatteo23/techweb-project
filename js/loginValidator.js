const formLogin = document.getElementById('formLogin');
const username = document.getElementById('username');
const password = document.getElementById('password');

formLogin.addEventListener('submit', e => {
    e.preventDefault();

    validForm = validateInputs();
    
    if(validForm)
        formLogin.submit()
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

function validateUsername(){
    const usernameValue = username.value.trim();    // trim remove white space
    
    if(usernameValue === '') {
        setError(username, 'Username is required')
        validForm = false
    } else {
        setSuccess(username)
    }

    return validForm
}

function validatePassword(){
    const passwordValue = password.value.trim();

    if(passwordValue === '') {
        setError(password, 'Password is required')
        validForm = false
    } else {
        setSuccess(password);
    }

    return validForm
}

function validateInputs () {    

    var validForm = true
 
    validForm = (validForm & validateUsername())
    validForm = (validForm & validatePassword())

    return validForm
}