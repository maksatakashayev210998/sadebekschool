<?php
$this->title = $modul->name;
?>

<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/">
                        <button class="btn-artka btn-all">
                            <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                            Артқа
                        </button>
                    </a>
                    <div class="box-all">
                        <div class="title-k"><?= $modul->name ?></div>
                        <div class="title-desk"><?= $modul->description ?></div>
                    </div>

                    <?php if (Yii::$app->session->hasFlash('inmodule_permisison')): ?>
                        <br>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?= Yii::$app->session->getFlash('inmodule_permisison') ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="courses">
                    <div class="col-xs-12">
                        <div class="title-k visible-xs"></div>
                        <div class="modd-desc">
                            Модульдері
                        </div>
                    </div>
                    <div class="col-xs-12 text-dec">
                        <?php foreach ($inmodul as $item) { ?>
                            <?php if ($item->modulePermission !== NULL): ?>
                                <a href="/site/lessons?id=<?= $item->id ?>&modid=<?= $modul->id ?>">
                                    <div class="modul-box">
                                        <div class="modul-img-box">
                                            <img class="modul-img" src="/img/<?= $item->img ?>" alt="">
                                        </div>
                                        <div class="modul-content">
                                            <div class="title-modul-c"><?= $item->name ?></div>
                                            <button class="btn-m-sabak btn-all">
                                                Сабақтарды көру
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            <?php else : ?>
                                <div class="cursor" href="javascript: void(0)">
                                    <div class="modul-box not-permission">
                                        <div class="modul-img-box not-permission">
                                            <img class="modul-img" src="/img/<?= $item->img ?>" alt="">
                                        </div>
                                        <div class="modul-content">
                                            <div class="title-modul-c"><?= $item->name ?></div>
                                            <p class="not-permission">Сізге бұл модульді көруге доступ жоқ!</p>
                                            <button type="button" class="btn-m-sabak btn-all cursor" disabled>
                                                Сабақтарды көру
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .not-permission {
        margin: 10px 0;
        color: red;
        font-weight: 700;
    }
</style>
