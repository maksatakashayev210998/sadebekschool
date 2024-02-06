<?php

use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = 'Менің кабинетім';
$san = 0;
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <?php if(Yii::$app->session->hasFlash('error')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?=Yii::$app->session->getFlash('error')?>
                    </div>
                <?php } ?>
                <?php if(Yii::$app->session->hasFlash('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <?=Yii::$app->session->getFlash('success')?>
                    </div>
                <?php } ?>
                <div class="col-xs-12">
                    <a href="/">
                        <button class="btn-artka btn-all">
                            <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                            Артқа
                        </button>
                    </a>
                    <div class="title-k top25">Жеке кабинет</div>
                </div>
                <div class="courses">
                        <div class="col-xs-12">
                            <div class="box-all">
                                <div class="cab-update">
                                    <div class="fio">Логин:</div>
                                    <div class="fio2"><?= $user->username ?></div>
                                    <br>
                                    <div class="fio">Аты-жөні:</div>
                                    <div class="fio2"><?= $user->fio ?></div>
                                    <br>
                                    <div class="fio">E-mail:</div>
                                    <div class="fio2"><?= $user->email ?></div>
                                    <br>
                                </div>
                                <button class="btn-upd btn-all" data-toggle="modal" data-target="#myModal">
                                    Мәліметтерді өзгерту
                                </button>
                                <button class="btn-upd btn-all" data-toggle="modal" data-target="#modalpass">
                                    Құпия сөзді өзгерту
                                </button>
                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-max">
            <div class="modal-header">
                <button type="button" class="close close-max" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-modal-upd">Мәліметтерді өзгерту</div>
                    <form class="user-upd" action="/site/updateuser" method="get">
                        <p class="control-label">Логин:</p>
                        <input type="text" name="username" class="form-control inp nomer-maska" value="<?=$user->username ?>" required>
                        <p class="control-label">Аты-жөні: </p>
                        <input type="text" name="fio" class="form-control inp" value="<?=$user->fio?>" required>
                        <p class="control-label">Email:</p>
                        <input type="email" class="form-control inp" name="email" value="<?=$user->email?>">
                        <button class="btn-all btn-upd-user" type="submit">Сақтау</button>
                    </form>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalpass" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-max">
            <div class="modal-header">
                <button type="button" class="close close-max" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-modal-upd">Құпия сөзді өзгерту</div>
                <div class="user-upd">
                    <?php $form = ActiveForm::begin(['action'=>'/site/updatepass']);?>
                    <p class="control-label">Жаңа құпия сөз: </p>
                    <input type="password" name="password" class="form-control inp" required>
                    <p class="control-label">Құпия сөзді қайталаңыз: </p>
                    <input type="password" name="password2" class="form-control inp" required>
                    <button class="btn-all btn-upd-user" type="submit">Сақтау</button>
                    <?php ActiveForm::end()?>
                </div>
            </div>
        </div>

    </div>
</div>