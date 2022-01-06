const src = document.getElementById("search");
const src_bar_wrapper = document.getElementById("src-bar-wrapper");
const src_bar = document.getElementById("src-bar");

src.addEventListener('click', function(){
    if(src_bar_wrapper.style.display != 'block'){
        src_bar_wrapper.style.display = 'block';
    } else{
        src_bar_wrapper.style.display = 'none';
    }
    //src_bar_wrapper.style.display = 'block';

}
);
