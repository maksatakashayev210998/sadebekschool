<?php

namespace backend\controllers;

use Yii;
use backend\models\Inmodul;
use backend\models\InmodulSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InmodulController implements the CRUD actions for Inmodul model.
 */
class InmodulController extends Controller
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
     * Lists all Inmodul models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InmodulSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmodul model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inmodul model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $model = new Inmodul();

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
     * Updates an existing Inmodul model.
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
     * Deletes an existing Inmodul model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteimg($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $delimg = Inmodul::findOne($id);
        if($delimg->img){
            $image_path = $delimg->img;
            if (!unlink($image_path)) {
                return false;
            }
            else {

            }
        }

        $delimgbaza = Inmodul::findOne($id);
        $delimgbaza->img = NULL;
        $delimgbaza->save();

        return $this->redirect(['update', 'id' => $id]);
    }
    /**
     * Finds the Inmodul model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmodul the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmodul::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
