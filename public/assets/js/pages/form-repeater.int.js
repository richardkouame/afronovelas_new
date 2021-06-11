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
                //console.log("inner show"), $(this).slideDown()
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