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
    
}

