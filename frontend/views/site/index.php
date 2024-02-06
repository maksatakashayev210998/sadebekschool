<?php

/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = 'Сабақтар';
$san = 0;
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-6 hidden-xs">
                    <div class="title-k">Курстар тізімі</div>
                </div>
                <div class="col-xs-6 hidden-xs">

                </div>
                <div class="courses">
                        <div class="col-xs-12">
                            <div class="title-k visible-xs">Курстар тізімі</div>
                        </div>
                        <?php foreach ($moduls as $modul) {
                            $san++;
                            ?>
                            <div class="col-sm-6 col-md-4 col-xs-12 dd">
                                <a href="/site/moduls?id=<?= $modul->id ?>">
                                    <div class="mod-box">
                                        <img class="mod-img" src="/img/<?= $modul->img ?>" alt="">
                                        <div class="mod-in">
                                            <div class="mod-name"><?= $modul->name ?></div>
<!--                                            <div class="mod-desc">--><?//= $modul->description ?><!--</div>-->
                                            <button class="btn-kku">
                                                Курсты ашу
                                            </button>
                                        </div>


                                    </div>
                                </a>
                                <div class="clear"></div>
                            </div>
                            <?php
                            if($san%3==0)
                                echo '<div class="clear visible-xs"></div>';
                            if($san%1==0)
                                echo '<div class="clear visible-xs"></div>';
                        }?>
                </div>
            </div>
        </div>
    </div>
</div>