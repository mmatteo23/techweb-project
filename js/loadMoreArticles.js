function loadMore(lastArticleLoaded) {
//--cookie che scade tra un'ora------
    var now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    document.cookie = "lastArticleLoaded=" + lastArticleLoaded + "; expires=" + now.toUTCString() + "; path=/";
    document.location.reload(true);
}