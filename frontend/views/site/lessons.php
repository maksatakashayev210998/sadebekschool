<?php
use backend\models\OpenModul;
date_default_timezone_set('Asia/Almaty');

/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = 'Сабақтар';
$san = 0;
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/site/moduls?id=<?= $modul->id ?>">
                        <button class="btn-artka btn-all">
                            <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                            Артқа
                        </button>
                    </a>
<!--                    <div class="title-k">--><?//= $modul->name ?><!--</div>-->
                </div>
                <div class="courses">
                        <div class="col-xs-12">
<!--                            <div class="title-k visible-xs">--><?//= $modul->name ?><!--</div>-->
                            <div class="modd-desc">
                                <span>Модуль:</span> <?= $inmodul->name ?>
                            </div>
                            <div class="mod-sab-name">Сабақтар</div>
                        </div>

                        <?php $i=1;
                        $user_id = \Yii::$app->user->id;
                        foreach ($lesson as $item) {
                            $open = OpenModul::find()->where(['user_id' => $user_id])->andwhere(['modul_id' => $modul->id])->one();
                            if ($open != null) {
                                if(!$item->opendate || strtotime($item->opendate) <= time()){
                            ?>
                            <div class="col-xs-12 dd">
                                <a href="/site/lesson?id=<?= $item->id ?>">
                                    <div class="box-lesson">
                                        <div class="box-1">
                                            <div class="number-l"><?=$i++?>. <?= $item->name ?></div>
                                        </div>
                                        <div class="box-2">
                                            <img class="vpered-img" src="/img/vpered.svg" alt="">
                                        </div>
                                    </div>
                                </a>
                                <div class="clear"></div>
                            </div>
                            <?php }else{ ?>
                            <div class="col-xs-12 dd">
                                    <div class="box-lesson">
                                        <div class="box-1">
                                            <div class="number-l"><?=$i++?>. <?= $item->name ?></div>
                                        </div>
                                        <div class="box-2">
                                            <h4 class="opendatetxt">Ашылу уақыты: <?=date('d.m.Y H:i', strtotime($item->opendate))?></h4>
                                        </div>
                                    </div>
                                <div class="clear"></div>
                            </div>
                            <?php } ?>
                                <?php } else{?>
                                <div class="col-xs-12 dd">
                                        <div class="box-lesson">
                                            <div class="box-1">
                                                <div class="number-l"><?=$i++?>. <?= $item->name ?></div>
                                            </div>
                                            <div class="box-2">
                                                <img class="vpered-img" src="/img/vpered.svg" alt="">
                                                <div class="dos-jab">Сізге доступ жабық!</div>
                                            </div>
                                        </div>
                                    <div class="clear"></div>
                                </div>

                        <?php }  } ?>
                </div>
            </div>
        </div>
    </div>
</div>