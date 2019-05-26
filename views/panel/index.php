<?php Flight::render('layouts/header'); ?>
<body>
<div>
    <?php Flight::render('layouts/panel_menu'); ?>
    <div class="container mt-5">
        <div class="row">

            <?php foreach ($records as $record): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="view overlay">
                            <?php if ($record['image']): ?>
                                <img class="card-img-top" src="<?php echo $record['image']?>" alt="image">
                            <?php endif ?>

                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <a class="activator waves-effect waves-light mr-4"><i class="fas fa-share-alt"></i></a>
                            <h5 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;" class="card-title" title="<?php echo $record['title']?>"><?php echo $record['title']?></h5>
                            <hr>
                            <div class="cart-record-text-wrapper">
                                <?php echo mb_strimwidth(strip_tags($record['editor']), 0, 100, "..."); ; ?>
                            </div>
                            <br>
                            <div class="d-flex justify-content-around">
                                <a href="/panel/record/delete/<?php echo $record['id']?>" class="black-text justify-content-end">Удалить</a>
                                <a href="/panel/record/edit/<?php echo $record['id']?>" class="black-text  justify-content-end">Редактировать</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>
</div>
</body>
<?php Flight::render('layouts/footer'); ?>