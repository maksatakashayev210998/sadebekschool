<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use backend\models\Modul;
use backend\models\Paket;

/* @var $this yii\web\View */
/* @var $model backend\models\Moduls */

$this->title = $us->fio;
$this->params['breadcrumbs'][] = ['label' => 'Қолданушылар', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Курстарға доступ', 'url' => ['modul']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tovari-index">
    <?
    $count = count($openpaket);
    if ($count != 0) { ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Пакеттің аты</th>
                <th>Дата</th>
                <th></th>
            </tr>
            <? foreach ($openpaket as $item) {
                $pakett = Paket::find()->where(['id' => $item->paket_id])->one();
                ?>
                <tr>
                    <td><h4><?= $pakett->name ?></h4></td>
                    <td> до <?= $item->time ?>, <?= $item->day ?> күн</td>
                    <td><a style="text-align: center;"
                           href="/admin/user/delpaket?id=<?= $item->id ?>&us=<?= $item->user_id ?>"><span
                                    style="font-size: 20px;" class="glyphicon glyphicon-remove-circle"
                                    aria-hidden="true"></span></a></td>
                </tr>
            <? } ?>
        </table>
    <? } ?>
    <? if ($j != 0) { ?>
        <h2>Пакетке доступ ашу</h2>
        <form action="/admin/user/openpaket" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Курстар</label>
                    <select class="form-control" name="paket_id">
                        <?php foreach ($pak as $item): ?>
                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Күн</label>
                    <input class="form-control" name="day" type="number" required>
                </div>
            </div>
            <input type="hidden" name="user" value="<?= $id ?>">
            <br>
            <button class="btn btn-success" type="submit">Ашу</button>
        </form>
    <? } ?>
</div>

<div class="widdd"></div>

<div class="tovari-index">
    <? $count = count($open);
    if ($count != 0) { ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Курстың аты</th>
                <th>Модульге доступ</th>
                <th>Дата</th>
                <th></th>
            </tr>
            <? foreach ($open as $item) {
                $modul = Modul::find()->where(['id' => $item->modul_id])->one();
                $inModule = \backend\models\Inmodul::find()->where(['modul_id' => $modul->id])->all();

                $inModulePermissions = \backend\models\InmodulePermission::find()->where(['modul_id' => $modul->id, 'user_id' => $item->user_id])->all();
                ?>
                <tr>
                    <td><h4><?= $modul->name ?></h4></td>
                    <th>
                        <?php if ($modul->name): ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter<?= $item->id ?>">
                                Модулдерге доступ ашу (<?= count($inModulePermissions) ?>)
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter<?= $item->id ?>"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="/admin/user/in-module-permission?user_id=<?= $item->user_id ?>"
                                              method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle"><?= $modul->name ?>
                                                    курсының модульдеріне доступ ашу</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning" role="alert">
                                                    Ескерту: Бұл жерге «<?= $modul->name ?>» атты курсының неше
                                                    модульіне доступ бергіңіз келеді, сол модульдер санын жазасыз!
                                                    Мысалы «<?= $modul->name ?>» атты курсының алғашқы 3 модульіне
                                                    доступ бергіңіз келді, астындағы жолға 3 деп жазасыз.
                                                </div>
                                                <div class="alert alert-info" role="alert">
                                                    Анықтама: «<?= $modul->name ?>» атты
                                                    курсында <?= count($inModule) ?> модуль бар!
                                                </div>
                                                <input type="hidden" name="_csrf"
                                                       value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                                <input class="form-control" min="1" type="number" name="inmodule_count"
                                                       required>
                                                <input class="form-control" type="hidden" name="modul_id"
                                                       value="<?= $modul->id ?>">

                                                <br>

                                                <?php if (count($inModulePermissions) > 0): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <h5 class="modal-title">
                                                            Ашылған модульдер тізімі (<?= count($inModulePermissions) ?>
                                                            ):
                                                        </h5>
                                                        <ul style="padding: 0">
                                                            <?php foreach ($inModulePermissions as $index => $inModulePermission): ?>
                                                                <?php $index = $index + 1; ?>
                                                                <ol> <?= $index ?>. <?= $inModulePermission->inModuleName->name ?></ol>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Жабу
                                                </button>
                                                <button type="submit" class="btn btn-primary">Сақтау</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </th>
                    <td> до <?= $item->time ?>, <?= $item->day ?> күн</td>
                    <td>
                        <a style="text-align: center;"
                           href="/admin/user/del?id=<?= $item->id ?>&us=<?= $item->user_id ?>">
                            <span style="font-size: 20px;" class="glyphicon glyphicon-remove-circle"
                                  aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <? } ?>
        </table>
    <? } ?>

    <? if ($k != 0) { ?>
        <h2>Курстарға доступ ашу</h2>
        <form action="/admin/user/open" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Курстар</label>
                    <select class="form-control" name="modul_id">
                        <?php foreach ($mod as $item): ?>
                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Күн</label>
                    <input class="form-control" name="day" type="number" required>
                </div>

            </div>

            <input type="hidden" name="user" value="<?= $id ?>">
            <br>
            <button class="btn btn-success" type="submit">Ашу</button>
        </form>
    <? } ?>
</div>


<style>
    .widdd {
        background: #292929;
        height: 1px;
        width: 100%;
        margin: 40px 0;
    }
</style>