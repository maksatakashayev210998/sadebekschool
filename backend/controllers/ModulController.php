<?php

namespace backend\controllers;

use Yii;
use backend\models\Modul;
use backend\models\ModulSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ModulController implements the CRUD actions for Modul model.
 */
class ModulController extends Controller
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

    /**
     * Lists all Modul models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $searchModel = new ModulSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modul model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Modul model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $model = new Modul();

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstance($model, 'files');
            $save_file = '';
            if($model->files){
                $imagepath = '../../frontend/web/img/moduls/';
                $model->img = $imagepath .time().'.'.$model->files->extension;
                $paths = $model->img;
                $save_file = 1;
            }
            if($model->files){
                $model->files->saveAs($paths, false);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Modul model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstance($model, 'files');
            $save_file = '';
            if($model->files){
                $imagepath = '../../frontend/web/img/moduls/';
                $model->img = $imagepath .time().'.'.$model->files->extension;
                $paths = $model->img;
                $save_file = 1;
            }
            if($model->files){
                $model->files->saveAs($paths, false);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Modul model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteimg($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $delimg = Modul::findOne($id);
        if($delimg->img){
            $image_path = $delimg->img;
            if (!unlink($image_path)) {
                return false;
            }
            else {

            }
        }

        $delimgbaza = Modul::findOne($id);
        $delimgbaza->img = NULL;
        $delimgbaza->save();

        return $this->redirect(['update', 'id' => $id]);
    }
    /**
     * Finds the Modul model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modul the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modul::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
