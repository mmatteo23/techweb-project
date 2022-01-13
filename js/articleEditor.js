
DecoupledEditor
    .create( document.querySelector( '#editor' ), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'mediaEmbed']
    } )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
});
/*
ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: {
            items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'link',
            '|',
            'undo',
            'redo'
            ]
        },
        language: 'en'
        })
    .catch( error => {
        console.error( error );
    } );*/

const editor = document.getElementById("editor");
const form = document.getElementById('articleForm');
const articleText = document.getElementById('articleText');
const title = document.getElementById('title');
const subtitle = document.getElementById('subtitle');
const minutes = document.getElementById('minutes');

form.addEventListener('submit', e => {
    e.preventDefault();
    if(document.activeElement.id != 'tags'){
        
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
    /*} else if (articleTextValue.length < 100) {
        setError(articleText, 'Article text needs to be at least 100 characters long.')
        validForm = false*/
    } else {
        setSuccess(articleText);
    }

    return validForm
}

//const tagContainer = document.querySelector('.tag-container');
const tagContainer = document.getElementById('article-tags');
//const inputTag = document.querySelector('.tag-container input');
const inputTag = document.getElementById('tags');

let tags = [];

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
  closeIcon.setAttribute('type', 'button');
  closeIcon.setAttribute('onclick', 'AddAllTheTags()');
  tagItem.appendChild(span);
  tagItem.appendChild(closeIcon);
  return tagItem;
}

function clearTags() {
  document.querySelectorAll('.tag').forEach(tag => {
    tag.parentElement.removeChild(tag);
  });
}

function addTags() {
  clearTags();
  tags.slice().reverse().forEach(tag => {
    tagContainer.prepend(createTag(tag));
  });
}

function AddAllTheTags(){
    if(document.getElementById("tags").value!=""){
        document.getElementById("tags").value.split(',').forEach(tag => {
            // check if the user insert a tag two times
            if(tags.indexOf(tag) == -1){
                tags.push(tag);
            }
        });
    
        addTags();
        tagContainer.style.display = "flex";
        inputTag.value = '';
    }
}

inputTag.addEventListener('keyup', (e) => {
    if (e.key === 'Enter') {
        AddAllTheTags();
    }
});

window.onload = function(){ 
    if(tags.length == 0){
        tagContainer.style.display = "none";
    }
    AddAllTheTags();
}

document.addEventListener('click', (e) => {
  //console.log(e.target.tagName);
  if (e.target.tagName === 'BUTTON') {
    const tagLabel = e.target.getAttribute('data-item');
    const index = tags.indexOf(tagLabel);
    tags = [...tags.slice(0, index), ...tags.slice(index+1)];
    addTags();
    if(tags.length == 0) 
        tagContainer.style.display = "none"; 
  }
})

//inputTag.focus();
