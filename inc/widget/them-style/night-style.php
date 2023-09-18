<?php
$them_dark = _PZ('theme_black');
if ($them_dark == '2') { ?>
    <script>
        // 检测浏览器是否处于夜间模式
        function isDarkMode() {
            return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        }

        // 根据当前主题添加或移除类
        function updateThemeLayout() {
            var body = document.body;

            if (isDarkMode()) {
                body.classList.add('mdui-theme-layout-dark');
            } else {
                body.classList.remove('mdui-theme-layout-dark');
            }
        }

        // 初始加载时更新主题
        updateThemeLayout();

        // 监听主题变化事件
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function() {
            updateThemeLayout();
        });
    </script>
<?php } elseif ($them_dark !== '0' && $them_dark !== '1') { ?>
    <script>
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
    </script>
<?php } ?>