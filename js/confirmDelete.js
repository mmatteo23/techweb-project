
function showModal() {
    var box = document.getElementById('delete-box');
    var backdrop = document.getElementById('backdrop');
    box.style.display = 'flex';
    backdrop.style.display = 'block';
}

function hideModal() {
    var box = document.getElementById('delete-box');
    var backdrop = document.getElementById('backdrop');
    box.style.display = 'none';
    backdrop.style.display = 'none';
}