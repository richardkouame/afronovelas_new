// Le document ready c'est pour initialisé le jQuery de javascript
$(document).ready(function () {
    0 < $("textarea.cms").length && tinymce.init({
        selector: "textarea.cms",
        height: 300,
        menubar: false,
        plugins: ["paste"],
        paste_as_text: true,
        entity_encoding : "raw",
        toolbar: "insertfile undo redo | bold italic | emoticons",
        content_style:''
    });

   0 <  $("input.timepicker").datetimepicker({
        datepicker: false,
        format: 'H:i',
        step: 5,
        mask: true
    });

});