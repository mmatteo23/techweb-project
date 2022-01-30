function enableDisableGenre(select_id) {

    var select_box_1 = document.getElementById("genre-1");
    var select_box_2 = document.getElementById("genre-2");


    if (select_id == 1) {
        // se lo sto disabilitando voglio disabilitare anche il pulsante 2
        if (!select_box_1.disabled) {
            select_box_2.disabled = true;
        }
        select_box_1.disabled = !select_box_1.disabled;
    }
    if (select_id == 2) {
        // lo abilito solo se il primo è già abilitato
        if (!select_box_1.disabled) {
            select_box_2.disabled = !select_box_2.disabled;
        }
    }
    
};

const form = document.getElementById('articleForm');
const cover = document.getElementById('cover');
const defaultCover = document.getElementById('default-article-img');
const gameName = document.getElementById('name');
const gameDescription = document.getElementById('description');
const genre_0 = document.getElementById('genre-0');
const genre_1 = document.getElementById('genre-1');
const genre_2 = document.getElementById('genre-2');
const releaseDate = document.getElementById('releaseDate');
const developer = document.getElementById('developer');

var validform = true;

form.addEventListener('submit', e => {
    e.preventDefault();
        
    validForm = validateInputs();
    
    if(validForm){
        form.submit()
    } 
});

const setError = (element, message) => {
    const inputWrapper = element.parentElement;
    const errorDisplay = inputWrapper.querySelector('.error');

    errorDisplay.innerText = message;
    inputWrapper.classList.add('error');
    inputWrapper.classList.remove('success');
};

const setSuccess = element => {
    const inputWrapper = element.parentElement;
    const errorDisplay = inputWrapper.querySelector('.error');

    errorDisplay.innerText = '';
    inputWrapper.classList.add('success');
    inputWrapper.classList.remove('error');
};

function validateInputs () {    
 
    validForm = (validForm & validateUsername())
    validForm = (validForm & validatePassword())

    return validForm
}

function validateName(submit = 0) {
    const gameNameValue = gameName.value;

    if (gameNameValue === '') {
        setError(gameName, 'Name is required')
        validForm = false
    } else {
        setSuccess(gameName)
    }

    return validForm
}

function validateDescription(submit = 0) {
    const gameDescriptionValue = gameDescription.value;

    if (gameDescriptionValue === '') {
        setError(gameDescription, 'Description is required')
        validForm = false
    } else {
        setSuccess(gameDescription)
    }

    return validForm
}

function validateReleaseDate(submit = 0) {
    const releaseDateValue = releaseDate.value;

    if (releaseDateValue === '') {
        setError(releaseDate, 'Release date is required')
        validForm = false
    } else {
        setSuccess(releaseDate)
    }

    return validForm
}

function validateDeveloper(submit = 0) {
    const developerValue = developer.value;

    if (developerValue === '') {
        setError(developer, 'Developer is required')
        validForm = false
    } else {
        setSuccess(developer)
    }

    return validForm
}

function validateInputs () {
    const coverValue = cover.value;
    const defaultCoverValue = defaultCover.value;
    const gameNameValue = gameName.value;
    const gameDescriptionValue = gameDescription.value;
    const releaseDateValue = releaseDate.value;
    const developerValue = developer.value;
    
    const coverExt = coverValue.slice(-3);
    const defaultCoverExt = defaultCoverValue.slice(-3);

    var genre_error = false;
    var validForm = true;

    if (document.getElementsByTagName('H1')[0].innerHTML !== "Edit game") {
        if (coverValue === '') {
            setError(cover, 'Cover image is required')
            validForm = false
        } else {
            setSuccess(cover)
        }
    
        if (defaultCoverValue === '') {
            setError(defaultCover, 'Default article image is required')
            validForm = false
        } else {
            setSuccess(defaultCover)
        }
    }

    if (coverValue !== '') {
        if (coverExt !== "jpg" && coverExt !== "png" && coverExt !== "gif") {
            setError(cover, 'Default article image\'s extension is not supported (Supported JPG,PNG,GIF)')
            validForm = false
        } else {
            setSuccess(cover)
        }
    }
    
    if (defaultCoverValue !== '') {
        if (defaultCoverValue !== '' && defaultCoverExt !== "jpg" && defaultCoverExt !== "png" && defaultCoverExt !== "gif") {
            setError(defaultCover, 'Default article image\'s extension is not supported (Supported JPG,PNG,GIF)')
            validForm = false
        } else {
            setSuccess(defaultCover)
        }
    }

    if (gameNameValue === '') {
        setError(gameName, 'Name is required')
        validForm = false
    } else {
        setSuccess(gameName)
    }

    if (gameDescriptionValue === '') {
        setError(gameDescription, 'Description is required')
        validForm = false
    } else {
        setSuccess(gameDescription)
    }

    if (!genre_1.disabled) {
        if (genre_0.value == genre_1.value)
            genre_error = true;
        if (!genre_2.disabled && !genre_error)
            if (genre_0.value == genre_2.value || genre_1.value == genre_2.value)
                    genre_error = true;
    }
    if (genre_error) {
        setError(genre_0, 'Genres must be different')
        validForm = false
    } else {
        setSuccess(genre_0);
    }

    if (releaseDateValue === '') {
        setError(releaseDate, 'Release date is required')
        validForm = false
    } else {
        setSuccess(releaseDate)
    }
    
    if (developerValue === '') {
        setError(developer, 'Developer is required')
        validForm = false
    } else {
        setSuccess(developer)
    }

    return validForm
};


