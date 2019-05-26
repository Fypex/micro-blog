jQuery(document).ready(function ($) {

    var maxFileSize = 2 * 1024 * 1024; // (байт) Максимальный размер файла (2мб)
    var queue = {};
    var form = $('form#create-records');
    var imagesList = $('#uploadImagesList');

    var itemPreviewTemplate = imagesList.find('.item.template').clone();
    itemPreviewTemplate.removeClass('template');


    $('#addImages').on('change', function () {
        var files = this.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if ( !file.type.match(/image\/(jpeg|jpg|png|gif)/) ) {
                alert( 'Фотография должна быть в формате jpg, png или gif' );
                continue;
            }

            if ( file.size > maxFileSize ) {
                alert( 'Размер фотографии не должен превышать 2 Мб' );
                continue;
            }

            preview(files[i]);
        }

        this.value = '';
    });

    // Создание превью
    function preview(file) {
        var reader = new FileReader();
        reader.addEventListener('load', function(event) {
            var img = document.createElement('img');

            var itemPreview = itemPreviewTemplate.clone();

            itemPreview.find('.img-wrap img').attr('src', event.target.result);
            itemPreview.data('id', file.name);
            $('#preview-img').attr('src', event.target.result);
            $('#addImagesPreview').attr('value', event.target.result);
            queue[file.name] = file;
            $('#delete-preview-button').attr('disabled', false);
        });
        reader.readAsDataURL(file);
    }

    // Удаление фотографий
    $('#delete-preview-button').click(function () {

        var item = imagesList.closest('.item'),
            id = item.data('id');

        $('#preview-img').attr('src', '');
        $('#addImagesPreview').attr('value', '');
        $(this).attr('disabled', true);
        delete queue[id];

        item.remove();
    });



    $('#publish-record-button').click(function() {
        var data = $('#publish-record-form').serializeArray();
        $.ajax({
            url: '/panel/record/create',
            type: 'POST',
            dataType : 'JSON',
            data: data,
            success: function(data) {
                if(data.status){
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },
        });
    });

    $('#update-record-button').click(function() {
        var data = $('#update-record-form').serializeArray();
        $.ajax({
            url: '/panel/record/update',
            type: 'POST',
            dataType : 'JSON',
            data: data,
            success: function(data) {
                if(data.status){
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },
        });
    });


    $(function () {
        $(".sticky").sticky({
            topSpacing: 5
            , zIndex: 2
            , stopper: "#YourStopperId"
        });
    });

});