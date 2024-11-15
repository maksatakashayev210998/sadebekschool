<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Сәлем <?= Html::encode($user->username) ?>,</p>

    <p>Құпия сөзді қалпына келтіру үшін төмендегі сілтемеге өтіңіз:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
