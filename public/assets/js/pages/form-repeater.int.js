$(document).ready(function () {
    "use strict";
    $(".repeater").repeater({
        isFirstItemUndeletable: true,
        defaultValues: {
            "textarea-input": "foo",
            "text-input": "bar",
            "select-input": "B",
            "checkbox-input": ["A", "B"],
            "radio-input": "B"
        }, show: function () {
            $(this).slideDown()
        }, hide: function (e) {
            confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
        }, ready: function (e) {
        }
    }), window.outerRepeater = $(".outer-repeater").repeater({
        defaultValues: {"text-input": "outer-default"},
        show: function () {
            $(this).slideDown()
        },
        hide: function (e) {
            $(this).slideUp(e)
        },
        repeaters: [{
            selector: ".inner-repeater",
            show: function () {
                $(this).children('div.col-2').last().after('<div class="col-2"><input data-repeater-delete type="button" class="btn btn-primary inner" value="-" title="Supprimer ce bloc"/></div>');
                $(this).children('div').children('input.timepicker').datetimepicker({
                    datepicker: false,
                    format: 'H:i',
                    step: 5,
                    mask: true
                });
                $(this).slideDown()
            },
            hide: function (e) {
                $(this).slideUp(e)
            }
        }]
    })
});