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
                    <thead>
                        <tr class="table__row table__row--header">
                            <th class="table__cell">Артикул</th>
                            <th class="table__cell">Название</th>
                            <th class="table__cell">Статус</th>
                            <th class="table__cell">Атрибуты</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="table__row">
                            <td class="table__cell">{{$product->article}}</td>
                            <td class="table__cell">{{$product->name}}</td>
                            <td class="table__cell">{{$product->status}}</td>
                            <td class="table__cell">
                                <ul class="table__attribute-list">
                                    @foreach($product->attributes as $name => $value)
                                        <li class="table__attribute">{{$name . ': ' . $value}}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
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
            <form class="modal__form" id="productForm" data-create_route="{{ route('product.create') }}">
                <label for="article" class="modal__label">Артикул</label>
                <input id="article" type="text" class="modal__input" name="article" required>
                <label for="name" class="modal__label">Название</label>
                <input id="name" type="text" class="modal__input" name="name" required>
                <label for="status" class="modal__label">Статус</label>
                <div class="custom-select">
                    <div class="selected-option">Доступен</div>
                    <input type="hidden" name="selectedOptionValue" id="selectedOptionValue" value="Доступен">
                    <ul class="options">
                        <li value="Доступен">Доступен</li>
                        <li value="Не доступен">Не доступен</li>
                    </ul>
                </div>
                <div class="attribute">
                    <p class="attribute__title">Атрибуты</p>
                    <div class="attribute__container">

                    </div>
                    <a class="attribute__button">+ Добавить атрибут</a>
                </div>
                <button type="submit" class="button modal__submit-button">Добавить</button>
            </form>
            <button class="modal__close-button" id="closeModalButton">×</button>
        </div>
    </div>

</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
