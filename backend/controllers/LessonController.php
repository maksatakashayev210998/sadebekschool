<?php

namespace backend\controllers;

use backend\models\Inmodul;
use Yii;
use backend\models\Lesson;
use backend\models\LessonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LessonController implements the CRUD actions for Lesson model.
 */
class LessonController extends Controller
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
     * Lists all Lesson models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }
        $searchModel = new LessonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionModultandau()
    {
        $id = Yii::$app->request->get('id');
        $inmodv = Inmodul::find()->where(['modul_id' => $id])->orderBy('id ASC')->all();
        return $this->renderPartial('modultandau', [
            'inmodv' => $inmodv
        ]);
    }
    /**
     * Displays a single Lesson model.
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
     * Creates a new Lesson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->admin!=1) {
            return $this->redirect('/admin/site/login');
        }

        $model = new Lesson();

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstance($model, 'files');
            $save_file = '';
            if($model->files){
                $imagepath = '../../frontend/web/file/';
                $model->file = $imagepath .time().'.'.$model->files->extension;
                $paths = $model->file;
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
     * Updates an existing Lesson model.
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
                $imagepath = '../../frontend/web/file/';
                $model->file = $imagepath .time().'.'.$model->files->extension;
                $paths = $model->file;
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
     * Deletes an existing Lesson model.
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
    public function actionDeletefile($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $delimg = Lesson::findOne($id);
        if($delimg->file){
            $image_path = $delimg->file;
            if (!unlink($image_path)) {
                return false;
            }
            else {

            }
        }

        $delimgbaza = Lesson::findOne($id);
        $delimgbaza->file = NULL;
        $delimgbaza->save();

        return $this->redirect(['update', 'id' => $id]);
    }
    /**
     * Finds the Lesson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lesson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
