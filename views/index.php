<?php Flight::render('layouts/header'); ?>
    <body>
        <?php Flight::render('layouts/menu'); ?>
        <div id="app">
            <div class="container">
                <div class="row mt-5">
                    <?php foreach ($records as $record): ?>

                        <div class="col-md-4">
                                <div class="card mb-3">
                                    <a style="color:unset" href="/record/show/<?php echo $record['id']?>">
                                        <div class="view overlay">
                                            <?php if ($record['image']): ?>

                                                <img class="card-img-top" src="<?php echo $record['image']?>" alt="image">

                                            <?php endif ?>
                                            <div style="cursor:pointer;" class="mask rgba-white-slight"></div>
                                        </div>
                                        <div class="card-body pb-0">
                                            <p class="activator waves-effect waves-light mr-4"><i class="fas fa-share-alt"></i></p>
                                            <h5 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;" class="card-title" title="<?php echo $record['title']?>"><?php echo $record['title']?></h5>
                                            <hr>
                                            <div class="cart-record-text-wrapper">
                                                <?php echo mb_strimwidth(strip_tags($record['editor']), 0, 100, "..."); ; ?>
                                            </div>
                                            <br>
                                            <?php if ($_SESSION['user']): ?>
                                                <a href="/panel/record/edit/<?php echo $record['id']?>" class="black-text d-inline-block float-left index-edit-button">Редактировать</a>
                                            <?php endif ?>
                                            <p class="text-right d-inline-block float-right"><?php echo $record['date']?></p>
                                        </div>
                                    </a>
                                </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </body>
<?php Flight::render('layouts/footer'); ?>