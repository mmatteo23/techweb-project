const src = document.getElementById("search");
const src_bar_wrapper = document.getElementById("search-bar-wrapper");
const src_bar = document.getElementById("search-bar");

src.addEventListener('onclick', function(){
    src_bar_wrapper.style.display = 'block';
    src_bar.focus();
}
);
