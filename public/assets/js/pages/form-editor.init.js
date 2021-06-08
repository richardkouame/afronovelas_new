$(document).ready(function () {
    0 < $("textarea.cms").length && tinymce.init({
        selector: "textarea.cms",
        height: 300,
        menubar: false,
        toolbar: "insertfile undo redo | bold italic | emoticons",
        content_style:''
    })
});