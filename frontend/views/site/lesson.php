<?php
use common\models\User;
use backend\models\Comuser;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
use backend\models\Coment;

date_default_timezone_set('Asia/Almaty');

/* @var $this yii\web\View */
$query = Coment::find()->where(['sabak_id' => $lesson->id])->orderBy(['id' => SORT_DESC]);
$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 15]);
$coments = $query->offset($pages->offset)
    ->limit($pages->limit)
    ->all();
$com_user = Coment::find()->where(['sabak_id' => $lesson->id])->andwhere(['user_id' => Yii::$app->user->id])->all();
$com_count = count($com_user);

$user_id = \Yii::$app->user->id;
$this->title = 'Сабақтар';
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/site/lessons?id=<?=$inmodul->id?>&modid=<?= $modul->id?>">
                        <button class="btn-artka btn-all">
                            <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                            Артқа
                        </button>
                    </a>
<!--                    <div class="title-lk">--><?//= $modul->name ?><!--</div>-->
                </div>
                <div class="courses">
                        <div class="col-xs-12">
                            <div class="box-all">
                                <div class="sab-title"><?= $lesson->name ?></div>
                                <div class="sab-desc"><?= $lesson->description ?></div>
                                <div class="sabak-video">
                                    <div class="plyr__video-embed" id="player">
                                        <?= $lesson->video ?>
                                    </div>
                                </div>
                                <?php if ($lesson->video2 != null){?>
                                    <div class="sabak-video">
                                        <div class="plyr__video-embed" id="player">
                                            <?= $lesson->video2 ?>
                                        </div>
                                    </div>
                                <?php }  ?>
                                <?php if ($lesson->video3 != null){?>
                                    <div class="sabak-video">
                                        <div class="plyr__video-embed" id="player">
                                            <?= $lesson->video3 ?>
                                        </div>
                                    </div>
                                <?php }  ?>
                                <?php if ($lesson->homework != null){?>
                                    <div class="sab-taps">Тапсырма:</div>
                                    <div class="sab-homew">
                                        <?= $lesson->homework ?>
                                    </div>
                                <?php }  ?>
                                <?php if ($lesson->file != null){?>
                                    <a href="<?= $lesson->file ?>" download>
                                        <button class="btn-jukteu btn-all">
                                            Материал жүктеу
                                        </button>
                                    </a>
                                <?php }  ?>
                                <?php if ($lesson->file2 != null){?>
                                    <a href="<?= $lesson->file2?>" download>
                                        <button class="btn-jukteu btn-all">
                                            Материал жүктеу
                                        </button>
                                    </a>
                                <?php }  ?>
								<?php if ($lesson->test != 0){?>
                                    <a href="<?= '/site/test?id='.$lesson->id?>">
                                        <button class="btn-jukteu btn-all">
                                            Тест тапсыру
                                        </button>
                                    </a>
                                <?php }  ?>
                            </div>


<!--                            COMENTS-->
                            <div class="wid100"></div>
                            <div class="com-jazu">
                                <?php $form = ActiveForm::begin(['action' => '/site/coments']); ?>
                                <input type="hidden" name="sabak" value="<?= $lesson->id ?>">
                                <input type="hidden" name="modid" value="<?= $modul->id ?>">
                                <?= $form->field($coment, 'coment')->textarea(['class' => 'coments', 'name' => 'coment'])->label('Пікір қалдыру', ['class' => 'com_lab']); ?>
                                <button class="btn-jiber btn-all">Жіберу</button>
                                <?php ActiveForm::end(); ?>
                            </div>
                            <?php
                            foreach ($coments as $com) {
                                $uss = User::find()->where(['id' => $com->user_id])->one();
                                $reply = Comuser::find()->where(['com_id' => $com->id])->all();
                                $dt = intval($com->time);
                                $date = date('H:i', $dt);
                                ?>
                                <div class="comentsblock  col-xs-12 ">
                                    <div class="shapka col-sm-6 col-xs-12 p0 visible-xs">
                                        <div class="jauap-right">
                                            <span class="glyphicon glyphicon-share-alt"></span>
                                            <div class="jauapja jauapjaz<?= $com->id ?>">Жауап жазу</div>
                                        </div>
                                        <?php if ($com->user_id == Yii::$app->user->identity->id){?>
                                            <form class="form-del" action="/site/delcom" method="get">
                                                <input type="hidden" name="comid" value="<?= $com->id ?>">
                                                <input type="hidden" name="userid" value="<?= $com->user_id ?>">
                                                <input type="hidden" name="sabid" value="<?= $com->sabak_id ?>">
                                                <input type="hidden" name="modid" value="<?= $modul->id ?>">
                                                <button class="btndel" type="submit">╳</button>
                                            </form>
                                        <?php }  ?>
                                    </div>
                                    <div class="shapka  col-sm-6 col-xs-12 p0">
                                        <h4 class="usname ">
                                            <?= $uss->fio ?>
                                        </h4>
                                        <div class="comment-date">
                                            <img class="calendar" src="/img/time.png" alt=""> <?= $date?> <img class="calendar" src="/img/calendar.png" alt=""> <?= $com->getDate(); ?>
                                        </div>
                                    </div>
                                    <div class="shapka col-sm-6 col-xs-12 p0 hidden-xs">
                                        <?php if ($com->user_id == Yii::$app->user->identity->id){?>
                                            <form class="form-del" action="/site/delcom" method="get">
                                                <input type="hidden" name="comid" value="<?= $com->id ?>">
                                                <input type="hidden" name="userid" value="<?= $com->user_id ?>">
                                                <input type="hidden" name="sabid" value="<?= $com->sabak_id ?>">
                                                <input type="hidden" name="modid" value="<?= $modul->id ?>">
                                                <button class="btndel" type="submit">╳</button>
                                            </form>
                                        <?php }  ?>
                                        <div class="jauap-right">
                                            <span class="glyphicon glyphicon-share-alt"></span>
                                            <div class="jauapja jauapjaz<?= $com->id ?>">Жауап жазу</div>
                                        </div>
                                    </div>
                                    <div class="comentaries  col-xs-12 ">
                                        <p><?= $com->coment ?></p>
                                    </div>
                                    <div class="reply_coment  col-xs-12 ">
                                        <?php
                                        foreach ($reply as $key) {
                                            $repus = User::find()->where(['id' => $key->reply_user_id])->one();
                                            ?>
                                            <div class="shapka  col-lg-6 p0">
                                                <h4 class="usname"><?= $repus->fio ?></h4>
                                                <div class="comment-date">
                                                    <img class="calendar" src="/img/time.png" alt=""> <?= $date?> <img class="calendar" src="/img/calendar.png" alt=""> <?= $com->getDate(); ?>
                                                </div>
                                            </div>
                                            <div class="comentaries-reply  col-lg-12 ">
                                                <?= $key->coment ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="reply col-xs-12 p0 hidden-com<?= $com->id;?>">
                                        <?php $form = ActiveForm::begin(['action' => '/site/reply']); ?>
                                        <div class="reply8">
                                            <?= $form->field($replycom, 'coment')->textInput(['class' => 'rep', 'name' => 'reply', 'placeholder' => 'Жауап қалдырыңыз'])->label('', ['class' => 'sds']) ?>
                                            <input type="hidden" name="us_id" value="<?= $uss->id ?>">
                                            <input type="hidden" name="com_id" value="<?= $com->id ?>">
                                            <input type="hidden" name="sab_id" value="<?= $lesson->id ?>">
                                            <input type="hidden" name="modid" value="<?= $modul->id ?>">
                                        </div>
                                        <div class="reply4">
                                            <button class="btn pikirsss hidden-xs">Жауап жазу</button>
                                            <button class="btn pikirsss visible-xs"><span
                                                        class="glyphicon glyphicon glyphicon-chevron-right"></span></button>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                        <div class="bastart bastarty<?= $com->id;?>">Жауап жазудан бас тарту үшін басыңыз.</div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $('.jauapjaz<?= $com->id;?>').click(function () {
                                        $('.hidden-com<?= $com->id;?>').css("display", "block");
                                    });
                                    $('.bastarty<?= $com->id;?>').click(function () {
                                        $('.hidden-com<?= $com->id;?>').css("display", "none");
                                    });
                                </script>
                                <?php
                            }
                            ?>
                            <?= LinkPager::widget([
                                'pagination' => $pages,
                            ]); ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>