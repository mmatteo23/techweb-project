function enableDisableGenre(select_id) {
    var select_box = document.getElementById("genre-"+select_id);
    select_box.disabled = !select_box.disabled;
}

