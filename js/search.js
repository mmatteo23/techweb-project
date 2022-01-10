const src = document.getElementById("search");
const src_bar_wrapper = document.getElementById("src-bar-wrapper");
const src_bar = document.getElementById("src-bar");
const breadcrumb = document.getElementById("breadcrumb");

src.addEventListener('click', function(){
    if(src_bar_wrapper.style.display != 'block'){
        src_bar_wrapper.style.display = 'block';
        if(window.innerWidth >= 570)
            breadcrumb.style.marginTop = '-40px';
    } else{
        src_bar_wrapper.style.display = 'none';
        if(window.innerWidth >= 570)
            breadcrumb.style.marginTop = '0';
    }
    src_bar.focus();
    src.blur(); 
}
);
window.onresize = function() {
    if(window.innerWidth >=570 && src_bar_wrapper.style.display == 'block'){
        breadcrumb.style.marginTop = '-40px';
    }
    else if(window.innerWidth >=570 && src_bar_wrapper.style.display != 'block')
        breadcrumb.style.marginTop = '0';
    else if(window.innerWidth <570)
        breadcrumb.style.marginTop = '0';
}