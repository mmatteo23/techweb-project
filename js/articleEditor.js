DecoupledEditor
.create( document.querySelector( '#editor' ), {
    removePlugins: [
        'CKFinderUploadAdapter', 
        'CKFinder', 
        'EasyImage', 
        'Image', 
        'ImageCaption', 
        'ImageStyle', 
        'ImageToolbar',
        'ImageUpload', 
        'MediaEmbed', 
        'mediaEmbed', 
        'FontColor', 'FontFamily', 'FontSize', 'FontBackgroundColor',
        'textalignment',
        'IncreaseIndent',
        'DecreaseIndent'
    ]
} )
.then( editor => {
    const toolbarContainer = document.querySelector( '#toolbar-container' );
    
    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
} )
.catch( error => {
    console.error( error );
});

window.addEventListener('load', setFormInputs);

const editor = document.getElementById("editor");
const form = document.getElementById('articleForm');
const articleText = document.getElementById('articleText');
const title = document.getElementById('title');
const subtitle = document.getElementById('subtitle');
const minutes = document.getElementById('minutes');
const altImage = document.getElementById('alt-image');
const btnRemovePreview = document.getElementById('remove-preview-button');

function setFormInputs() {
    if(document.getElementById("article_cover_image")){
        btnRemovePreview.style.display = 'block';
        altImage.parentElement.style.display = "block";
    } else {
        btnRemovePreview.style.display = 'none';
        altImage.parentElement.style.display = "none";
    }
}

form.addEventListener('submit', e => {
    e.preventDefault();
    if(document.activeElement.id != 'tags' && document.activeElement.id != "tag-confirm-button"){
        
        validForm = validateInputs();
        
        if(validForm){
            var content = editor.innerHTML;
            articleText.value = content.toString();
            //console.log(content.toString());
            inputTag.value = tags.join(';')
            form.submit()
        }
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

function validateImage() {
    const fileInput = document.getElementById('cover')
    var file = document.getElementById("cover").files[0];

    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        setError(fileInput, 'Please select a valid image file')
        document.getElementById("cover").value = '';
        return false;
    }

    if(file.size > 2097152) {
        setError(fileInput, 'File too large. File must be less than 2 MB.')
        document.getElementById("cover").value = '';
        return false;
    }

    setSuccess(fileInput)
    return true;
}

function showPreview(event){
    if(event.target.files.length > 0 && validateImage()){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview;
        if(document.getElementById("article_cover_image")){
            preview = document.getElementById("article_cover_image");
        } else {
            preview = document.createElement("img");
            preview.id = "article_cover_image";
            document.getElementsByTagName("figure")[0].appendChild(preview);
        }
        preview.src = src;
        preview.setAttribute("alt", "selected article cover image preview");
        preview.style.display = "block";
        altImage.parentElement.style.display = "block";
        btnRemovePreview.style.display = 'block';
    } else {
        document.getElementById("article_cover_image").remove();
        altImage.parentElement.style.display = "none";
        btnRemovePreview.style.display = 'none';
    }
}

function removePreview(){
    document.getElementById("article_cover_image").remove();
    document.getElementById('cover').value = '';
    altImage.value = '';


    // remove front end
    altImage.parentElement.style.display = "none";
    btnRemovePreview.style.display = 'none';
}

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
    } else if (articleTextValue.length < 100) {
        setError(articleText, 'Article text needs to be at least 100 characters long.')
        validForm = false
    } else {
        setSuccess(articleText);
    }

    return validForm
}

//const tagContainer = document.querySelector('.tag-container');
const tagContainer = document.getElementById('article-tags');
//const inputTag = document.querySelector('.tag-container input');
const inputTag = document.getElementById('tags');

var tags = [];

function createTag(label) {
  const tagItem = document.createElement('li');
  tagItem.setAttribute('class', 'tag');
  tagItem.classList.add("typed-tag");
  const span = document.createElement('span');
  span.innerHTML = label;
  const closeIcon = document.createElement('button');
  closeIcon.innerHTML = 'close';
  closeIcon.setAttribute('class', 'material-icons');
  closeIcon.setAttribute('data-item', label);
  closeIcon.setAttribute('aria-label', 'Press to remove tag');
  closeIcon.setAttribute('type', 'button');
  closeIcon.setAttribute('onclick', 'deleteTag("'+label+'")');
  tagItem.appendChild(span);
  tagItem.appendChild(closeIcon);
  return tagItem;
}

function clearTags() {
  document.querySelectorAll('.tag').forEach(tag => {
    tag.parentElement.removeChild(tag);
  });
}

function deleteTag(tagLabel) {
    document.querySelectorAll('.tag').forEach(tag => {
        if (tagLabel == tag.firstChild.innerHTML) {
            tag.parentElement.removeChild(tag);
            tags.splice(tags.indexOf(tagLabel),1);
        }
    });
}

function addTags() {
  //clearTags();
  tags.slice().reverse().forEach(tag => {
    tagContainer.prepend(createTag(tag));
  });
}

function AddAllTheTags(){
    if(document.getElementById("tags").value!=""){
        document.getElementById("tags").value.split(',').forEach(tag => {
            // check if the user inserted a tag twice
            if(tags.indexOf(tag) == -1){
                tags.push(tag);
                tagContainer.prepend(createTag(tag));
            }
        });
        //addTags();
        tagContainer.style.display = "flex";
        inputTag.value = '';
    }
}

window.onload = function(){ 
    if(tags.length == 0){
        tagContainer.style.display = "none";
    }
    AddAllTheTags();
}
