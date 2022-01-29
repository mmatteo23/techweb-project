const form = document.getElementById('articleForm');
const title = document.getElementById('title');
const subtitle = document.getElementById('subtitle');
const minutes = document.getElementById('minutes');
const articleText = document.getElementById('articleText');

var changes = false;

form.addEventListener('submit', e => {
    e.preventDefault();

    validForm = validateInputs();
    
    if(validForm)
        form.submit()
});

function updateChanges(){ 
    changes = true; 
    console.log(changes);
}

window.addEventListener('beforeunload', function (e) {

    // Check if any of the input was changed
    if (changes) {
        // Cancel the event and
        // show alert that the unsaved
        // changes would be lost
        e.preventDefault();
        e.returnValue = 'Ehi Gamer! You haven\'t submit your article, if you go away you will lost all changes.';
    }
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

function validateInputs () {
    const titleValue = title.value;    // trim remove white space
    const subtitleValue = subtitle.value;
    const minutesValue = minutes.value;
    const articleTextValue = articleText.value;

    var validForm = true

    if(titleValue === '') {
        setError(title, 'Title is required')
        validForm = false
    } else {
        setSuccess(title)
    }

    if(subtitle === '') {
        setError(subtitle, 'Subtitle is required')
        validForm = false
    } else {
        setSuccess(subtitle)
    }

    if(minutes === '') {
        setError(minutes, 'A valid minutes number is required')
        validForm = false
    } else if (!(Number.isInteger(minutes))) {
        setError(minutes, 'Please provide a positive number')
        validForm = false
    } else {
        setSuccess(minutes)
    }

    if(articleText === '') {
        setError(articleText, 'A text is required')
        validForm = false
    } else if (articleText.length < 100) {
        setError(password, 'Article text needs to be at least 100 characters long.')
        validForm = false
    } else {
        setSuccess(password);
    }

    return validForm
}