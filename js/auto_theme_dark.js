var haveChromeColor = document.getElementsByName('theme-color').length > 0;
var body = document.querySelector('body');

if(body){
    if (!sessionStorage.getItem('ns_night-styles')) {
        var handleColorChange = function handleColorChange(mql) {
          if (sessionStorage.getItem('ns_night-styles')) {
            return;
          }
          if (mql.matches) {
            body.classList.add("mdui-theme-layout-dark");
            if (haveChromeColor) {
              document.getElementsByName('theme-color')[0].setAttribute("content", "#212121");
            }
          } else {
            body.classList.remove("mdui-theme-layout-dark");
            if (haveChromeColor) {
              document.getElementsByName('theme-color')[0].setAttribute("content", document.getElementsByName('mdx-main-color')[0].getAttribute("content"));
            }
          }
        };
      
        var mql = window.matchMedia("(prefers-color-scheme: dark)");
        mql.addEventListener('change', handleColorChange);
        handleColorChange(mql);
      } else {
        if (sessionStorage.getItem('ns_night-styles') === "true") {
          document.addEventListener('DOMContentLoaded', function () {
            if (!body.classList.contains('mdui-theme-layout-dark')) {
              body.classList.add('mdui-theme-layout-dark');
            }
          });
      
          if (haveChromeColor) {
            document.getElementsByName('theme-color')[0].setAttribute("content", "#212121");
          }
        }
      }
}
