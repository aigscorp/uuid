<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div>
            <div class="brand-text font-weight-light text-center" style="color: #fff;padding-top: 10px;">Генератор UUID</div>
        </div>
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
            <div class="os-resize-observer-host observed">
                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                <div class="os-resize-observer"></div>
            </div>
            <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 284px;"></div>
            <div class="os-padding">
                <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item">
                                    <a href="{{route('main')}}" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            список всех UUID
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('test')}}" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            тест API UUID
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 20.9713%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar-corner"></div>
        </div>

    </aside>

    <div class="content-wrapper" style="min-height: 230px; margin-left: 150px;">
        @yield('content')
    </div>

    <footer class="main-footer">
        <strong>Copyright © 2023 <a href="{{route('main')}}">UUID</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
</div>
<div class="jqvmap-label" style="display: none;"></div>

</body>
</html>
