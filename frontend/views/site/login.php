<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сайтқа кіру | Minsvell';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="forma">
						
                    <div class="forma-in">
                        <div class="logo-txt">
                            SadebekDesign
                            <p>оқыту платформасы</p>
                        </div>
						<?php
					$session = Yii::$app->session;
					
						 if( $session->has('logout') ): ?>
					<div class="alert alert-danger alert-dismissible " role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $session->get('logout'); ?>
					</div>
					<?php endif;?>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => '8(___) ___-____', 'id' => 'phone' ])->label('Логин (телефон номеріңіз )') ?>
                        <div class="mb30"></div>
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Құпия сөз',])->label('Құпия сөз') ?>

                        <!--                    --><?//= $form->field($model, 'rememberMe')->checkbox() ?>



                        <div class="form-group">
                            <?= Html::submitButton('Кіру', ['class' => 'btn btn-kiru', 'name' => 'login-button']) ?>
                        </div>
                        <div class="reset-text">
                            <a  href="/site/reset">
                                Құпия сөзді қалпына келтіру
                            </a>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
<!--                <img class="mins" src="/img/fon1mob.png" alt="">-->
            </div>
<!--            <div class="col-sm-6 col-xs-12">-->
<!--                <img class="kyz-svg" src="/img/akmaral2.png" alt="">-->
<!--            </div>-->
        </div>
    </div>
</div>
