var haveChromeColor = document.getElementsByName('theme-color').length > 0;
if (!sessionStorage.getItem('ns_night-styles')) {
    var handleColorChange = function handleColorChange(mql) {
        if (sessionStorage.getItem('ns_night-styles')) {
            return;
        }
        if (mql.matches) {
            document.getElementsByTagName('body')[0].classList.add("mdui-theme-layout-dark");
            if (haveChromeColor) {
                document.getElementsByName('theme-color')[0].setAttribute("content", "#212121");
            }
        } else {
            document.getElementsByTagName('body')[0].classList.remove("mdui-theme-layout-dark");
            if (haveChromeColor) {
                document.getElementsByName('theme-color')[0].setAttribute("content", document.getElementsByName('mdx-main-color')[0].getAttribute("content"));
            }
        }
    };
    var mql = window.matchMedia("(prefers-color-scheme: dark)");
    mql.addListener(handleColorChange);
    handleColorChange(mql);
} else {
    if (sessionStorage.getItem('ns_night-styles') === "true") {
        document.getElementsByTagName('body')[0].className += " mdui-theme-layout-dark";
        if (haveChromeColor) {
            document.getElementsByName('theme-color')[0].setAttribute("content", "#212121");
        }
    }
}