let lastScrollTop = 0;
window.addEventListener("scroll", function () {
    let st = window.pageYOffset || document.documentElement.scrollTop;
    if (st < lastScrollTop) {
        document.getElementById('headerSticky').style.top = "0";
    } else {
        document.getElementById('headerSticky').style.top = "-100vh";
    }
    lastScrollTop = st <= 0 ? 0 : st;
}, false);