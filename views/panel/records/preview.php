<?php Flight::render('layouts/header'); ?>
    <body>
    <div>
        <?php Flight::render('layouts/menu'); ?>
        <h1 class="text-center mt-5"><?php echo $title_record; ?></h1>
        <p class="text-center"><?php echo $date; ?></p>
        <div class="container st-article-page mt-5 mb-5 p-0">

            <?php if ($image): ?>
                <div class="st-article-image">
                    <img width="100%" src="<?php echo $image?>" alt="png">
                </div>
            <?php endif ?>

            <div class="st-article-content pb-3">
                <?php echo $editor ?>

                <?php if ($author): ?>
                    <div class="st-article-author text-right pb-3">
                        <p>Автор: <span><?php echo $author ?></span></p>
                    </div>
                <?php endif ?>

            </div>

        </div>
    </div>
    </body>
<?php Flight::render('layouts/footer'); ?>