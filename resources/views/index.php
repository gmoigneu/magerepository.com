
<!doctype html>
<html lang="en" ng-app="mageRepository">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MageRepository - Collection of Magento 2 open-source modules</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="material.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">MageRepository.com</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="">Contact</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Menu</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Contact</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <!-- content -->
                <div class="mdl-grid" ui-view>

                </div>
                <!-- !content -->
                <footer class="mdl-mega-footer">
                    <div class="mdl-mega-footer--middle-section">
                        <div class="mdl-mega-footer--drop-down-section">
                            <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer--heading">Features</h1>
                            <ul class="mdl-mega-footer--link-list">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Updates</a></li>
                            </ul>
                        </div>
                        <div class="mdl-mega-footer--drop-down-section">
                            <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer--heading">Details</h1>
                            <ul class="mdl-mega-footer--link-list">
                                <li><a href="#">Spec</a></li>
                                <li><a href="#">Tools</a></li>
                                <li><a href="#">Resources</a></li>
                            </ul>
                        </div>
                        <div class="mdl-mega-footer--drop-down-section">
                            <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer--heading">Technology</h1>
                            <ul class="mdl-mega-footer--link-list">
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Patterns</a></li>
                                <li><a href="#">Usage</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Contracts</a></li>
                            </ul>
                        </div>
                        <div class="mdl-mega-footer--drop-down-section">
                            <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
                            <h1 class="mdl-mega-footer--heading">FAQ</h1>
                            <ul class="mdl-mega-footer--link-list">
                                <li><a href="#">Questions</a></li>
                                <li><a href="#">Answers</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mdl-mega-footer--bottom-section">
                        <div class="mdl-logo">
                            More Information
                        </div>
                        <ul class="mdl-mega-footer--link-list">
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Privacy and Terms</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <script src="/node_modules/material-design-lite/material.min.js"></script>
    <script src="/bundle.js"></script>

</body>
</html>
