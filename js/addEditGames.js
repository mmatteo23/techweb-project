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

window.addEventListener('load', setFormInputs);

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
const btnRemovePreview1 = document.getElementById('remove-preview-button-1');
const btnRemovePreview2 = document.getElementById('remove-preview-button-2');

var validform = true;

function setFormInputs() {
    if(document.getElementById("game_cover_image")){
        btnRemovePreview1.style.display = 'block';
    } else {
        btnRemovePreview1.style.display = 'none';
    }
    if(document.getElementById("default_article_cover_image")){
        btnRemovePreview2.style.display = 'block';
    } else {
        btnRemovePreview2.style.display = 'none';
    }
}

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

function validateImage(id) {
    const fileInput = document.getElementById(id)
    var file = document.getElementById(id).files[0];

    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        setError(fileInput, 'Please select a valid image file')
        document.getElementById(id).value = '';
        return false;
    }

    if(file.size > 2097152) {
        setError(fileInput, 'File too large. File must be less than 2 MB.')
        document.getElementById(id).value = '';
        return false;
    }

    setSuccess(fileInput)
    return true;
}

function showPreview1(event){
    if(event.target.files.length > 0 && validateImage('cover')){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview;
        if(document.getElementById("game_cover_image")){
            preview = document.getElementById("game_cover_image");
        } else {
            preview = document.createElement("img");
            preview.id = "game_cover_image";
            document.getElementsByTagName("figure")[0].appendChild(preview);
        }
        preview.src = src;
        preview.style.display = "block";
        btnRemovePreview1.style.display = 'block';
    } else {
        document.getElementById("game_cover_image").remove();
        btnRemovePreview1.style.display = 'none';
    }
}

function removePreview1(){
    document.getElementById("game_cover_image").remove();
    document.getElementById('cover').value = '';
    btnRemovePreview1.style.display = 'none';
    const fileInput = document.getElementById('cover')
    setError(fileInput, 'Please select an image')
}

function showPreview2(event){
    if(event.target.files.length > 0 && validateImage('default-article-img')){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview;
        if(document.getElementById("default_article_cover_image")){
            preview = document.getElementById("default_article_cover_image");
        } else {
            preview = document.createElement("img");
            preview.id = "default_article_cover_image";
            document.getElementsByTagName("figure")[1].appendChild(preview);
        }
        preview.src = src;
        preview.style.display = "block";
        btnRemovePreview2.style.display = 'block';
    } else {
        document.getElementById("default_article_cover_image").remove();
        btnRemovePreview2.style.display = 'none';
    }
}

function removePreview2(){
    document.getElementById("default_article_cover_image").remove();
    document.getElementById('default-article-img').value = '';
    btnRemovePreview2.style.display = 'none';
    const fileInput = document.getElementById('default-article-img')
    setError(fileInput, 'Please select an image')
}

function validateInputs () {
    const coverValue = cover.value;
    const defaultCoverValue = defaultCover.value;
    const gameNameValue = gameName.value;
    const gameDescriptionValue = gameDescription.value;
    const releaseDateValue = releaseDate.value;
    const developerValue = developer.value;
    
    const coverExt = coverValue.slice(-3).toLowerCase();
    const defaultCoverExt = defaultCoverValue.slice(-3).toLowerCase();

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


