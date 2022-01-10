DecoupledEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
} );

const editor = document.getElementById('editor');
const form = document.getElementById('articleForm');
const articleText = document.getElementById('articleText');
const title = document.getElementById('title');
const subtitle = document.getElementById('subtitle');
const minutes = document.getElementById('minutes');

form.addEventListener('submit', e => {
    e.preventDefault();

    var content = editor.innerHTML;
    articleText.value = content.toString();
    
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

function validateInputs () {
    const titleValue = title.value;    // trim remove white space
    const subtitleValue = subtitle.value;
    const minutesValue = minutes.value;
    const articleTextValue = editor.innerText;

    var validForm = true

    if(titleValue === '') {
        setError(title, 'Title is required')
        validForm = false
    } else {
        setSuccess(title)
    }

    if(subtitleValue === '') {
        setError(subtitle, 'Subtitle is required')
        validForm = false
    } else {
        setSuccess(subtitle)
    }

    if(minutesValue === '') {
        setError(minutes, 'A valid minutes number is required')
        validForm = false
    } else if (!(Number.isInteger(parseInt(minutes))) && parseInt(minutes) <= 0) {
        setError(minutes, 'Please provide a positive number')
        validForm = false
    } else {
        setSuccess(minutes)
    }

    if(articleTextValue === '') {
        setError(articleText, 'A text is required')
        validForm = false
    } else if (articleTextValue.length < 5) {
        setError(articleText, 'Article text needs to be at least 100 characters long.')
        validForm = false
    } else {
        setSuccess(articleText);
    }

    return validForm
}
