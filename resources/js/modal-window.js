$(document).ready(function () {
    const $openModalButton = $('#openModalButton');
    const $closeModalButton = $('#closeModalButton');
    const $modal = $('#addProductModal');

    $openModalButton.on('click', function () {
        $modal.css('display', 'block');
    });

    $closeModalButton.on('click', function () {
        $modal.css('display', 'none');
    });
});
