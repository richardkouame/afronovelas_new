$(document).ready(function () {
    $('.delete-element').on('click', function (e) {
        e.preventDefault();
        $form = $(this).attr('data-form');

        if (window.confirm('Voulez-vous supprimer cet element ?'))
            $('#' + $form).submit();
    })
})