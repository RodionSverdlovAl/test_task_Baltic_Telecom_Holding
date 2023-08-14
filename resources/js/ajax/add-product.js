$(document).ready(function() {
    $('#productForm').submit(function(event) {
        event.preventDefault(); // Предотвращаем обычное поведение формы
        let createRoute = $(this).data('create_route');
        // Создаем объект для атрибутов
        let attributes = {};

        // Собираем данные атрибутов из всех элементов с классом 'attribute__item'
        $('.attribute__item').each(function() {
            let name = $(this).find('.attribute__input[name="attribute_name"]').val();
            let value = $(this).find('.attribute__input[name="attribute_value"]').val();
            if (name && value) {
                attributes[name] = value;
            }
        });

        // Создаем JSON объект с атрибутами
        let attributesJSON = JSON.stringify(attributes);

        // Отправляем AJAX запрос
        $.ajax({
            type: 'POST',
            url: createRoute,
            data: {
                article: $('#article').val(),
                name: $('#name').val(),
                status: $('#selectedOptionValue').val(),
                attributes: attributesJSON
            },
            success: function(response) {
                // Обработка успешного ответа от сервера
                console.log('Товар успешно создан:', response);
                // Здесь вы можете выполнить дополнительные действия,
                // например, очистить форму или обновить список товаров
            },
            error: function(error) {
                // Обработка ошибки
                console.error('Ошибка при создании товара:', error);
            }
        });
    });
});
