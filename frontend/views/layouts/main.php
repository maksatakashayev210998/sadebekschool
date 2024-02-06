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


<div class="wrap">
    <div class="widb30 hidden-xs">
        <div class="nav-fix">
            <div class="fixxx">
                <div class="logo-txtx">
                    <a href="/">
                        SadebekDesign
                        <p>оқыту платформасы</p>
                    </a>
                </div>
                <div class="menu-new">
                    <ul>
                        <li>
                            <a href="/site/my">
                                <img class="mu-ic" src="/img/ic1.svg" alt="">
                                Менің курстарым
                            </a>
                        </li>
                        <li>
                            <a href="/site/question">
                                <img class="mu-ic" src="/img/ic2.svg" alt="">
                                Сұрақ-жауап
                            </a>
                        </li>
                        <li>
                            <a href="/site/regulations">
                                <img class="mu-ic" src="/img/ic3.svg" alt="">
                                Ережелер
                            </a>
                        </li>
                        <li>
                            <a href="/site/cabinet">
                                <img class="mu-ic" src="/img/ic4.svg" alt="">
                                Жеке кабинет
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="menu-moob visible-xs">
        <div class="col-xs-3 visible-xs">
            <div class="mada visible-xs">
                <input id="hamburger" class="hamburger" type="checkbox"/>
                <label class="hamburger" for="hamburger">
                    <i class="iii"></i>
                </label>
                <section class="drawer-list">
                    <ul>
                        <li class="ert"><a class="menu-color" href="/site/my"><img class="mu-img" src="/img/ic1.svg" alt=""><span class=""> Менің курстарым</span></a></li>
                        <li class="ert"><a class="menu-color" href="/site/question"><img class="mu-img" src="/img/ic2.svg" alt=""><span class=""> Сұрақ-жауап</span></a></li>
                        <li class="ert"><a class="menu-color" href="/site/regulations"><img class="mu-img" src="/img/ic3.svg" alt=""><span class=""> Ережелер</span></a></li>
                        <li class="ert"><a class="menu-color" href="/site/cabinet"><img class="mu-img" src="/img/ic4.svg" alt=""><span class=""> Жеке кабинет</span></a></li>
                    </ul>
                </section>
            </div>
        </div>
        <div class="col-xs-6 dggg">
            <a href="/">
                <div class="logo-txtx">
                    <a href="/">
                        Мақпал Шадай
                        <p>оқыту платформасы</p>
                    </a>
                </div>
            </a>
        </div>
        <div class="col-xs-3 visible-xs">
            <div class="menu-block2">
                <img class="menu-img" src="/img/user.svg" alt="">
                <div class="user-h hidden-xs"><?= Yii::$app->user->identity->fio; ?></div>
                <div class="menu-box">
                    <div class="menu-col">
                        <img class="user-img" src="/img/user.png" alt="">
                    </div>
                    <div class="menu-col2 text-dec">
                        <a class="sokaa" href="/site/cabinet">
                            <button class="men-b" type="submit">Аккаунт</button>
                        </a>
                        <a class="sokaa" href="/site/logout" data-method="post">
                            <button class="men-b" type="submit">Шығу</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widb70">
        <div class="header-m hidden-xs">
            <div class="container-fluid">
                <div class="cont">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="flex-d">
                                <div class="menu-block2">
                                    <img class="menu-img" src="/img/user.svg" alt="">
                                    <div class="user-h hidden-xs"><?= Yii::$app->user->identity->username; ?></div>
                                    <!--                                <div class="menu-box">-->
                                    <!--                                    <div class="menu-col">-->
                                    <!--                                        <img class="user-img" src="/img/user-p.png" alt="">-->
                                    <!--                                    </div>-->
                                    <!--                                    <div class="menu-col2 text-dec">-->
                                    <!--                                        <a class="sokaa" href="/site/cabinet">-->
                                    <!--                                            <button class="men-b" type="submit">Аккаунт</button>-->
                                    <!--                                        </a>-->
                                    <!--                                        <a class="sokaa" href="/site/logout" data-method="post">-->
                                    <!--                                            <button class="men-b" type="submit">Шығу</button>-->
                                    <!--                                        </a>-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->
                                </div>

                                <div class="wigyy">
                                    <a href="/site/logout" data-method="post">
                                        <button class="btn-logout">
                                            Шығу
                                        </button>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
