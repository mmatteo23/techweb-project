let changes = false;

form.addEventListener("input", function () {
    changes = true;
});

window.addEventListener('beforeunload', function (e) {
    console.log(e, e.type)
    // Check if any of the input was changed
    if (changes && document.activeElement.id != 'submit-btn') {
        // Cancel the event and
        // show alert that the unsaved
        // changes would be lost
        e.preventDefault();
        e.returnValue = 'Stop';
    }
});