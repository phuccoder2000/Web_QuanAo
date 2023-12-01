$(function () {
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    })
    $(".select2-init").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    })
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.tinymce_editor_init",
        deprecation_warnings: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        // file_browser_callback: function (field_name, url, type, win) {
        //     var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        //     var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        //
        //     var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        //     if (type === 'image') {
        //         cmsURL = cmsURL + "&type=Images";
        //     } else {
        //         cmsURL = cmsURL + "&type=Files";
        //     }
        //
        //     tinyMCE.activeEditor.windowManager.open({
        //         file: cmsURL,
        //         title: 'Filemanager',
        //         width: x * 0.8,
        //         height: y * 0.8,
        //         resizable: "yes",
        //         close_previous: "no"
        //     });
        // }
        file_picker_callback: function (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let type = 'image' === meta.filetype ? 'Images' : 'Files',
                url = editor_config.path_absolute + 'filemanager?editor=tinymce5&type=' + type;

            tinymce.activeEditor.windowManager.openUrl({
                url: url,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
})
