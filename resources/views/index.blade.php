<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>index</title>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar__header">
            <div class="sidebar__header-logo-wrapper">
                <img class="sidebar__header-logo" src="{{asset('assets/images/logo.svg')}}" alt="logo">
            </div>
            <div class="sidebar__header-text">
                Enterprise
                Resource
                Planning
            </div>
        </div>
        <div class="sidebar__menu">
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__item">
                        <a class="menu__link" href="#" >Продукты</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <main>
        <div class="main-content">
            <div class="top-menu">
                <nav class="top-menu__nav">
                    <ul class="top-menu__list">
                        <li class="top-menu__item"><a href="#" class="top-menu__link"></a>Продукты</li>
                    </ul>
                </nav>
                <div class="user-info top-menu__user-info">
                    Свердлов Родион Александрович
                </div>
            </div>
            <div class="content">
                @yield('content') <!-- Вставляем главную область -->
            </div>
        </div>
    </main>
</div>


</body>
</html>
