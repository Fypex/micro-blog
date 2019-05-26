<?php Flight::render('layouts/header'); ?>
    <body>
    <div>
        <?php Flight::render('layouts/panel_menu'); ?>
        <div class="sticky">
            <a href="<?php echo $_SERVER ['HTTP_REFERER']; ?>" class="btn btn-dark mt-0">Вернутся</a>
        </div>
        <div class="container">
            <div id="uploadImagesList">
                <div class="item template">
                        <span class="img-wrap">
                            <img id="preview-img" style="max-width: 900px;width: 100%" src="<?php echo $record['image'] ?>" alt="">
                        </span>
                </div>
            </div>
            <form target="_blank" action="/panel/record/preview" enctype="multipart/form-data" class="pt-2" id="update-record-form" method="POST">
                <input style="display: none" name="imageFile" type="file" id="addImages">
                <input name="id" type="hidden" value="<?php echo $record['id'] ?>">
                <input name="imageFilePreview" type="hidden" id="addImagesPreview" value="<?php echo $record['image'] ?>">
                <div class="md-form form-lg">
                    <input type="text" id="RecordsCreate" name="title" class="form-control form-control-lg" value="<?php echo $record['title'] ?>">
                    <label for="RecordsCreate">Заголовок статьи</label>
                </div>
                <div class="md-form form-lg">
                    <input type="text" id="RecordsCreate" name="author" class="form-control form-control-lg" value="<?php echo $record['author'] ?>">
                    <label for="RecordsCreate">Автор</label>
                </div>
                <div class="md-form form-lg">
                    <textarea id="edit" name="editor"><?php echo $record['editor'] ?></textarea>
                </div>

                <div class="btn-group mb-4 image-buttons float-right" role="group">
                    <button type="submit" class="btn btn-dark mt-0">Предпросмотр</button>
                    <button id="update-record-button" type="button" class="btn btn-dark mt-0">Обновить публикацию</button>
                </div>
            </form>
            <div class="btn-group mb-4 image-buttons" role="group">
                <a onclick="$('#addImages').trigger('click')" class="btn btn-dark mt-0">Изображение</a>
                <button id="delete-preview-button" class="delete-link btn btn-dark mt-0" disabled>Удалить</button>
            </div>
        </div>
    </div>
    <script>
        var editor = CKEDITOR.replace("editor");

        editor.on("change", function( evt ) {
            $("#edit").text(evt.editor.getData());
        });



        $img = $('#preview-img').attr('src');
        if($img){
            $('#delete-preview-button').attr('disabled', false);
        }
    </script>
    </body>
<?php Flight::render('layouts/footer'); ?>