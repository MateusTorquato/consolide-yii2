<?php

namespace app\controllers;

use Yii;
use app\models\Marcas;
use app\models\MarcasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * MarcasController implements the CRUD actions for Marcas model.
 */
class MarcasController extends Controller
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
     * Lists all Marcas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarcasSearch();
        $query = $searchModel->search(Yii::$app->request->queryParams);

        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count
        ]);

        $marcas = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => $searchModel,
            'marcas' => $marcas,
            'pagination' => $pagination
        ]);
    }

    /**
     * Displays a single Marcas model.
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
     * Creates a new Marcas model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Marcas();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "Marca criada com sucesso.");
                return $this->redirect(['index']);
            } else {
                $key = array_key_first($model->errors);
                Yii::$app->session->setFlash('error', "Erro ao criar marca. " . $model->errors[$key][0]);
            }
       }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Marcas model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', "Marca atualizada com sucesso.");
                return $this->redirect(['index']);
            } else {
                $key = array_key_first($model->errors);
                Yii::$app->session->setFlash('error', "Erro ao atualizar marca. " . $model->errors[$key][0]);
            }
       }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Marcas model.
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

    /**
     * Finds the Marcas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Marcas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marcas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
