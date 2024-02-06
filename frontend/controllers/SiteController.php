<?php

namespace frontend\controllers;

use backend\models\Inmodul;
use backend\models\InmodulePermission;
use backend\models\Lesson;
use backend\models\Modul;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Coment;
use backend\models\Comuser;
use yii\helpers\Url;
use backend\models\User;
use backend\models\OpenModul;
use backend\models\Test;
use yii\db\Expression;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return parent::beforeAction($action);
        } else {
            $session = Yii::$app->session;
            $session->open();
            $sid = $session->get('session_id');
            if (Yii::$app->user->identity->session_id != $sid) {
                Yii::$app->user->logout();
                $session->set('logout', 'Сіздің аккаунтқа басқа құрылғыдан кірді');
                return $this->goHome();
            }
        }
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        $moduls = Modul::find()->all();
        $count = count($moduls);
        return $this->render('index', [
            'moduls' => $moduls,
            'count' => $count,
        ]);
    }

    public function actionMy()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $moduls = Modul::find()->all();
        $count = count($moduls);



        return $this->render('my', [
            'moduls' => $moduls,
            'count' => $count,
        ]);
    }

    public function actionModuls($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $modul = Modul::find()->where(['id' => $id])->one();
        $inmodul = Inmodul::find()->where(['modul_id' => $id])->all();

        return $this->render('moduls', [
            'modul' => $modul,
            'inmodul' => $inmodul,
        ]);
    }

    public function actionLessons($id, $modid)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $modul = Modul::find()->where(['id' => $modid])->one();
        $inmodul = Inmodul::find()->where(['id' => $id])->one();
        $lesson = Lesson::find()->where(['modul_id' => $modid])->andWhere(['inmodul_id' => $id])->all();

        $inModulPermission = InmodulePermission::find()->where(['inmodule_id' => $inmodul->id, 'user_id' => Yii::$app->user->id])->one();

        if (!$inModulPermission){
            \Yii::$app->session->setFlash('inmodule_permisison', 'Сізге бұл модульге доступ берілмеген!');
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('lessons', [
            'modul' => $modul,
            'inmodul' => $inmodul,
            'lesson' => $lesson,
        ]);
    }

    public function actionLesson($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $user_id = \Yii::$app->user->id;
        $lesson = Lesson::find()->where(['id' => $id])->one();
        $modul = Modul::find()->where(['id' => $lesson->modul_id])->one();
        $inmodul = Inmodul::find()->where(['id' => $lesson->inmodul_id])->one();
        $ope = OpenModul::find()->where(['modul_id' => $modul->id])->andwhere(['user_id' => $user_id])->one();

        $inModulPermission = InmodulePermission::find()->where(['inmodule_id' => $inmodul->id, 'user_id' => $user_id])->one();

        if (!$inModulPermission){
            \Yii::$app->session->setFlash('inmodule_permisison', 'Сізге бұл модульге доступ берілмеген!');
            return $this->redirect(Yii::$app->request->referrer);
        }

        if ($ope == null || $ope->time <= date('Y-m-d')) {
            return $this->redirect('/');
        }
        $coment = new Coment();
        $replycom = new Comuser();


        return $this->render('lesson', [
            'modul' => $modul,
            'inmodul' => $inmodul,
            'lesson' => $lesson,
            'coment' => $coment,
            'replycom' => $replycom,
        ]);
    }

    public function actionTest($id)
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        $user_id = \Yii::$app->user->id;
        //$modul = Modul::find()->where(['id' => $lesson->modul_id])->one();
        //$ope = OpenModul::find()->where(['modul_id'=>$modul->id])->andwhere(['user_id'=>$user_id])->one();
        //if ($ope == null || $ope->time <= date('Y-m-d')) {
        // return $this->redirect('/');
        //}

        $test = Test::find()->where(['lesson_id' => $id])->orderBy(new Expression('rand()'))->limit(10)->all();
        $lesson = Lesson::find()->where(['id' => $id])->one();
        $inmodul = Inmodul::find()->where(['id' => $lesson->inmodul_id])->one();
        return $this->render('test', [
            'test' => $test,
            'lesson' => $lesson,
            'inmodul' => $inmodul,
        ]);
    }

    public function actionComents()
    {
        $coment = new Coment();
        $sabak = $_POST['sabak'];
        $com = $_POST['coment'];
        $id = $_GET['id'];
        $coment->sabak_id = $sabak;
        $coment->coment = $com;
        $coment->date = date('Y-m-d');
        $coment->time = time();
        $coment->user_id = Yii::$app->user->id;
        if ($coment->save(false)) {
            Yii::$app->response->redirect(Url::to('/site/lesson?id=' . $sabak));
        } else {
            return $this->redirect(['/site?error=1']);
        }
    }

    public function actionReply()
    {
        $coment = $_POST['reply'];
        $us_id = $_POST['us_id'];
        $sab_id = $_POST['sab_id'];
        $com_id = $_POST['com_id'];
        $reply = new Comuser();
        $reply->coment = $coment;
        $reply->user_id = $us_id;
        $reply->sab_id = $sab_id;
        $reply->reply_user_id = Yii::$app->user->id;
        $reply->com_id = $com_id;
        if ($reply->save(false)) {
            Yii::$app->response->redirect(Url::to('/site/lesson?id=' . $sab_id));
        } else {
            return $this->redirect(['/site?error=1']);
        }
    }

    public function actionDelcom()
    {
        $comid = $_GET['comid'];
        $userid = $_GET['userid'];
        $sabid = $_GET['sabid'];
        $modid = $_GET['modid'];
        $com = Coment::find()->where(['user_id' => $userid])->andWhere(['id' => $comid])->one();
        if ($com->delete(false)) {
            Yii::$app->response->redirect(Url::to('/site/lesson?id=' . $sabid));
        } else {
            Yii::$app->response->redirect(Url::to('/site/lesson?id=' . $sabid));
        }
    }

    public function actionCabinet()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        return $this->render('cabinet', [
            'user' => $user,
        ]);
    }

    public function actionQuestion()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        return $this->render('question');
    }

    public function actionRegulations()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        return $this->render('regulations');
    }

    public function actionNotifications()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        return $this->render('notifications');
    }

    public function actionDuties()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        return $this->render('duties');
    }

    public function actionUpdateuser()
    {
        $user_id = \Yii::$app->user->id;
        $request = Yii::$app->request;
        $username = $request->get('username');
        $email = $request->get('email');
        $fio = $request->get('fio');
        $model = User::find()->where(['id' => $user_id])->one();
        $model->username = $username;
        $model->fio = $fio;
        $model->email = $email;
        $model->save();
        Yii::$app->response->redirect(Url::to('cabinet'));
    }

    public function actionUpdatepass()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if ($password != $password2) {
            Yii::$app->session->setFlash('error', "Құпия сөздер бірдей емес!");
            return $this->redirect(['cabinet']);
        } else {
            $user->setPassword($password);
            $user->update(false);
            Yii::$app->session->setFlash('success', "Құпия сөз өзгертілді!");
            return $this->redirect(['cabinet']);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = '@app/views/layouts/main2.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session = Yii::$app->session;
            $session_rand = Yii::$app->security->generateRandomString(10);
            $session->set('session_id', $session_rand);
            $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            $user->session_id = $session_rand;
            $user->update();
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionErroruser()
    {
        return $this->render('erroruser');
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = '@app/views/layouts/main2.php';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionResetpass()
    {
        $email = $_GET['email'];
        $user = User::find()->where(['email' => $email])->one();

        if ($email == $user->email) {
            Yii::$app->mailer->compose()
                ->setFrom(['vip_maksat_97@mail.ru' => 'Құпия сөзді қалыпқа келтіру'])
                ->setTo($email)
                ->setSubject('INCON GROUP Ltd')
                ->setHtmlBody('Сәлеметсізбе, ' . $user->fio . '! Сіз <a href="https://minsvel-kurs.kz/">minsvel-kurs.kz/</a> порталынан құпия сөзді қалпына келтіруге өтініш жіберіпсіз. <br> Сіздің құпия сөзіңіз: <b style="font-size: 25px"> ' . $user->password . '</b> <br> Төмендегі сілтемені басып сайтқа кіре аласыз: <br> <a style="font-size: 15px" href="https://minsvel-kurs.kz/">https://minsvel-kurs.kz/</a> <br><br> Құрметпен, Minsvel. <br> Сайт: <a href="https://minsvel-kurs.kz/">https://minsvel-kurs.kz/</a> <br>')
                ->send();
            Yii::$app->session->setFlash('success', 'Почтаңызға ұмытып қалған құпия сөз жіберілді. Почтаңызды тексеріңіз!');
            return Yii::$app->response->redirect(['/']);
        } else {
            Yii::$app->session->setFlash('error', "E-mail аккаунтқа тіркелмген немесе қате");
            return Yii::$app->response->redirect(['/site/reset']);
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('emailgo', 'Қосымша нұсқаулар электрондық поштаңызға жіберілді.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('emailno', 'Кешіріңіз, біз берілген электрондық пошта мекенжайының құпия сөзін қалпына келтіре алмаймыз.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionReset()
    {
        $this->layout = 'main2';
        return $this->render('reset');
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('savepass', 'Жаңа құпия сөз сақталынды.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
