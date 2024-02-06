<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php if( Yii::$app->session->hasFlash('emailgo') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('emailgo'); ?>
    </div>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('emailno') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('emailno'); ?>
    </div>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('savepass') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('savepass'); ?>
    </div>
<?php endif;?>
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//        ['label' => 'About', 'url' => ['/site/about']],
//        ['label' => 'Contact', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
//    ?>

<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<!--        --><?//= Alert::widget() ?>


<?= $content ?>

<!--	<script type="text/javascript">-->
<!--document.onkeydown = function(e) {-->
<!--if(event.keyCode == 123) {-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--}-->
<!--</script>	-->
<!--<script>-->
<!--    <!---->
<!--   //edit this message to say what you want-->
<!--    var message = "Запрещено клик правой кнопки мыши";-->
<!---->
<!--    function clickIE() {-->
<!--        if (document.all) {-->
<!--            alert(message);-->
<!--            return false;-->
<!--        }-->
<!--    }-->
<!--    function clickNS(e) {-->
<!--        if (document.layers || (document.getElementById && !document.all)) {-->
<!--            if (e.which == 2 || e.which == 3) {-->
<!--                alert(message);-->
<!--                return false;-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--    if (document.layers) {-->
<!--        document.captureEvents(Event.MOUSEDOWN);-->
<!--        document.onmousedown = clickNS;-->
<!--    }-->
<!--    else {-->
<!--        document.onmouseup = clickNS;-->
<!--        document.oncontextmenu = clickIE;-->
<!--    }-->
<!---->
<!--    document.oncontextmenu = new Function("return false")-->
<!--   //-->
<!--</script>	-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
