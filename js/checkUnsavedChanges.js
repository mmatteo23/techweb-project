let changes = false;

form.addEventListener("input", function () {
    changes = true;
});

window.addEventListener('beforeunload', function (e) {

    // Check if any of the input was changed
    if (changes) {
        // Cancel the event and
        // show alert that the unsaved
        // changes would be lost
        e.preventDefault();
        e.returnValue = 'Ehi Gamer! You haven\'t submit your article, if you go away you will lost all changes.';
        return 'Ehi Gamer! You haven\'t submit your article, if you go away you will lost all changes.'
    }
});