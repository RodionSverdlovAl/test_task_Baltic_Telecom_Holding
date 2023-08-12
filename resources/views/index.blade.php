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
                        <li class="top-menu__item top-menu__item--active"><a href="#" class="top-menu__link">Продукты</a></li>
                        <li class="top-menu__item"><a href="#" class="top-menu__link">Заказы</a></li>
                    </ul>
                </nav>
                <div class="user-info top-menu__user-info">
                    Свердлов Родион Александрович
                </div>
            </div>
            <div class="content">
                <table class="table">
                    <tr class="table__row table__row--header">
                        <th class="table__cell">Артикул</th>
                        <th class="table__cell">Название</th>
                        <th class="table__cell">Статус</th>
                        <th class="table__cell">Атрибуты</th>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">12345</td>
                        <td class="table__cell">Продукт 1</td>
                        <td class="table__cell">Активен</td>
                        <td class="table__cell">
                            <ul class="table__attribute-list">
                                <li class="table__attribute">Размер: 4</li>
                                <li class="table__attribute">Цвет: черный</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">12345</td>
                        <td class="table__cell">Продукт 1</td>
                        <td class="table__cell">Активен</td>
                        <td class="table__cell">
                            <ul class="table__attribute-list">
                                <li class="table__attribute">Размер: 4</li>
                                <li class="table__attribute">Цвет: черный</li>
                            </ul>
                        </td>
                    </tr>
                    <!-- Другие строки таблицы здесь -->
                </table>
                <div class="content-button">
                    <button class="button" id="openModalButton">Добавить</button>
                </div>
            </div>
        </div>
    </main>

    <div class="modal" id="addProductModal">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <h2 class="modal__title">Добавить продукт</h2>
            <form class="modal__form">
                <label class="modal__label">Название продукта</label>
                <input type="text" class="modal__input" name="productName" required>
                <label class="modal__label">Цена</label>
                <input type="number" class="modal__input" name="productPrice" required>
                <button type="submit" class="button modal__submit-button">Добавить</button>
            </form>
            <button class="modal__close-button" id="closeModalButton">×</button>
        </div>
    </div>

</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
