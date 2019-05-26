<?php Flight::render('layouts/header'); ?>
    <body>
    <div>
        <?php Flight::render('layouts/menu'); ?>
        <div class="sticky">
            <a href="<?php echo $_SERVER ['HTTP_REFERER']; ?>" class="btn btn-dark mt-0">Вернутся</a>
        </div>
        <h1 class="text-center"><?php echo $record['title']; ?></h1>
        <p class="text-center"><?php echo $record['date']; ?></p>
        <div class="container st-article-page mt-5 mb-5 p-0">

            <?php if ($record['image']): ?>
                <div class="st-article-image">
                    <img width="100%" src="<?php echo $record['image']?>" alt="png">
                </div>
            <?php endif ?>

            <div class="st-article-content pb-3">
                <?php echo $record['editor'] ?>

                <?php if ($record['author']): ?>
                    <div class="st-article-author text-right pb-3">
                        <p>Автор: <span><?php echo $record['author'] ?></span></p>
                    </div>
                <?php endif ?>

            </div>

        </div>
    </div>
    </body>
<?php Flight::render('layouts/footer'); ?>