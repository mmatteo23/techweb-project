const box = document.getElementById('delete-box');
const backdrop = document.getElementById('backdrop');
const cancelDelete = document.getElementById('cancelDelete');
const confirmDelete = document.getElementById('confirmDelete');
const openDelete = document.getElementById('deleteBtn');

openDelete.addEventListener('click', function(){
    box.style.display = 'flex';
    backdrop.style.display = 'block';
})

cancelDelete.addEventListener('click', function(){
    box.style.display = 'none';
    backdrop.style.display = 'none';
})