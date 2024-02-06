<?php

namespace backend\controllers;

use backend\models\Inmodul;
use backend\models\InmodulePermission;
use backend\models\OpenPaket;
use backend\models\PaketMod;
use yii\helpers\Url;
use backend\models\Paket;
use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Modul;
use backend\models\OpenModul;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public $enableCsrfValidation = false;

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        $openModuls = OpenModul::find()->all();
//
//        foreach ($openModuls as $openModule){
//            $inModules = Inmodul::find()->where(['modul_id' => $openModule->modul_id])->all();
//
//            foreach ($inModules as $inModule){
//                $inModulePermission = InmodulePermission::find()
//                    ->where(['user_id' => $openModule->user_id, 'modul_id' => $openModule->modul_id, 'inmodule_id' => $inModule->id])
//                    ->one();
//
//                if (!$inModulePermission){
//                    $inModulePermission = new InmodulePermission();
//                    $inModulePermission->user_id = (int)$openModule->user_id;
//                    $inModulePermission->modul_id = (int)$openModule->modul_id;
//                    $inModulePermission->inmodule_id = (int)$inModule->id;
//                    $inModulePermission->save(false);
//                }
//            }
//        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionMod($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/site/site/login');
        }
        $us = User::find()->where(['id' => $id])->one();
        $open = OpenModul::find()->where(['user_id' => $id])->all();
        $modul = Modul::find()->all();
        $openpaket = OpenPaket::find()->where(['user_id' => $id])->all();
        $paket = Paket::find()->all();
        $k = 0;
        foreach ($modul as $item) {
            $i = 0;
            foreach ($open as $item2) {
                if ($item->id == $item2->modul_id) {
                    $i++;
                }
            }
            if ($i == 0) {
                $mod[$item->id] = $item;
                $k++;
            }

        }

        $j = 0;
        foreach ($paket as $item) {
            $i = 0;
            foreach ($openpaket as $item2) {
                if ($item->id == $item2->paket_id) {
                    $i++;
                }
            }
            if ($i == 0) {
                $pak[$item->id] = $item;
                $j++;
            }

        }
        return $this->render('mod', [
            'us' => $us,
            'open' => $open,
            'openpaket' => $openpaket,
            'mod' => $mod,
            'id' => $id,
            'k' => $k,
            'j' => $j,
            'pak' => $pak,
            'paket' => $paket,
        ]);
    }

    public function actionOpen()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }
        $request = Yii::$app->request;
        $user = $request->get('user');
        $modul_id = $request->get('modul_id');
        $day = $request->get('day');
        $day = '+' . $day . ' day';

        $model = new OpenModul();
        $model->user_id = intval($user);
        $model->modul_id = intval($modul_id);

        $model->time = date("Y-m-d", strtotime($day));
        $model->day = $request->get('day');
        $model->save();

        $inModules = Inmodul::find()->where(['modul_id' => $modul_id])->all();

        if (count($inModules) > 0) {
            foreach ($inModules as $inModule){
                $inModulePermission = InmodulePermission::find()
                    ->where(['user_id' => $user, 'inmodule_id' => $inModule->id, 'modul_id' => $modul_id])
                    ->one();

                if (!$inModulePermission){
                    $inModulePermission = new InmodulePermission();
                    $inModulePermission->user_id = (int)$user;
                    $inModulePermission->modul_id = (int)$modul_id;
                    $inModulePermission->inmodule_id = (int)$inModule->id;
                    $inModulePermission->save(false);
                }
            }
        }

        Yii::$app->response->redirect(Url::to('mod?id=' . $user));
    }

    public function actionDel($id, $us)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        $openModule = OpenModul::findOne($id);

        $inModulePermissions = InmodulePermission::find()
            ->where(['user_id' => $us, 'modul_id' => $openModule->modul_id])
            ->all();

        if (count($inModulePermissions) > 0) {
            foreach ($inModulePermissions as $inModulePermission) {
                $inModulePermission->delete();
            }
        }

        $openModule->delete();

        Yii::$app->response->redirect(Url::to('mod?id=' . $us));
    }

    public function actionInModulePermission($user_id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        $modul_id = Yii::$app->request->post('modul_id');
        $inmodule_count = Yii::$app->request->post('inmodule_count');

        $inModules = Inmodul::find()->where(['modul_id' => $modul_id])->all();

        if ($inModules) {
            foreach ($inModules as $index => $inModule) {
                $index = $index + 1;

                $inModulePermission = InmodulePermission::find()->where(['user_id' => $user_id, 'inmodule_id' => $inModule->id, 'modul_id' => $modul_id])->one();

                if ($inmodule_count >= $index) {
                    if (!$inModulePermission) {
                        $inModulePermission = new InmodulePermission();
                        $inModulePermission->user_id = (int)$user_id;
                        $inModulePermission->modul_id = (int)$modul_id;
                        $inModulePermission->inmodule_id = (int)$inModule->id;
                        $inModulePermission->save(false);
                    }
                } else {
                    if ($inModulePermission) {
                        $inModulePermission->delete();
                    }
                }
            }
        }

        return Yii::$app->response->redirect(Url::to('mod?id=' . $user_id));
    }

    public function actionOpenpaket()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }
        $request = Yii::$app->request;
        $user = $request->get('user');
        $paket_id = $request->get('paket_id');
        $day = $request->get('day');
        $day = '+' . $day . ' day';
        $pakett = PaketMod::find()->where(['paket_id' => $paket_id])->all();
        $pak = new OpenPaket();
        $pak->user_id = intval($user);
        $pak->paket_id = $paket_id;
        $pak->time = date("Y-m-d", strtotime($day));
        $pak->day = $request->get('day');
        $pak->save();
        foreach ($pakett as $item) {
            $model = new OpenModul();
            $model->user_id = intval($user);
            $model->modul_id = $item->modul_id;
            $model->time = date("Y-m-d", strtotime($day));
            $model->day = $request->get('day');
            $model->save();
        }
        Yii::$app->response->redirect(Url::to('mod?id=' . $user));
    }

    public function actionDelpaket($id, $us)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }
        $oppaket = OpenPaket::find()->where(['id' => $id])->one();

        Yii::$app->db->createCommand("
               DELETE FROM open_paket
               WHERE id = '$id'
          ")->execute();

        $pakett = PaketMod::find()->where(['paket_id' => $oppaket->paket_id])->all();

        foreach ($pakett as $item) {
            Yii::$app->db->createCommand("
               DELETE FROM open_modul
               WHERE modul_id = '$item->modul_id' AND user_id = '$us'
          ")->execute();
        }

        Yii::$app->response->redirect(Url::to('mod?id=' . $us));
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1) {
            return $this->redirect('/admin/site/login');
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
