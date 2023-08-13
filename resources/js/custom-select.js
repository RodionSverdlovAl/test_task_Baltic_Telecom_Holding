$('.custom-select').each(function() {
    const selectedOption = $(this).find('.selected-option');
    const selectedOptionValueInput = $(this).find('#selectedOptionValue');
    const optionsList = $(this).find('.options');
    const options = $(this).find('.options li');

    selectedOption.click(function() {
        optionsList.toggle();
        selectedOption.toggleClass('open', optionsList.is(':visible'));
    });

    options.each(function() {
        $(this).click(function() {
            selectedOption.text($(this).text());
            optionsList.hide();
            selectedOption.removeClass('open');

            const selectedValue = $(this).attr('value');
            selectedOptionValueInput.val(selectedValue);
        });
    });
});

$('#myForm').submit(function(event) {
    event.preventDefault();
    const formData = new FormData($(this)[0]);
    const selectedOptionValue = formData.get('selectedOptionValue');
    console.log('Значение для отправки:', selectedOptionValue);

    // Здесь вы можете выполнить отправку данных на сервер
});
