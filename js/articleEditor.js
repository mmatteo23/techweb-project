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
const inputContent = document.getElementById('articleContent');

form.addEventListener('submit', e => {
    e.preventDefault();

    var content = editor.innerHTML;
    inputContent.value = content.toString();
    console.log(inputContent.value);
    
    form.submit();
    
});
