<?php

namespace app\controllers;

use app\models\ProjectForm;
use Yii;
use app\models\Projects;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex($clear = 0, $pagesize = 4)
    {
        $query = Projects::find();
        if ('on' !== $clear) {
            $data = Yii::$app->request->get();
            foreach ($data as $key => $value) {
                if ('price' == $key) {
                    switch ($value) {
                        case '1':
                            $query->where('price < :price', [':price' => 1000000]);
                            break;
                        case '2':
                            $query->where(['between', 'price', 1000000, 3000000]);
                            break;
                        case '3':
                            $query->where('price > :price', [':price' => 3000000]);
                            break;
                    }
                }
                if ('floor' == $key) {
                    switch ($value) {
                        case 1 :
                            $query->andWhere('floor = :floor', [':floor' => 1]);
                            break;
                        case 2:
                            $query->andWhere('floor = :floor', [':floor' => 2]);
                            break;
                        case 3:
                            $query->andWhere('floor = :floor', [':floor' => 3]);
                            break;
                    }
                }
                if ('material' == $key) {
                    switch ($value) {
                        case 1:
                            $query->andWhere('material_brevno = :brevno', [':brevno' => 1]);
                            break;
                        case 2:
                            $query->andWhere('material_brus = :brus', [':brus' => 1]);
                            break;
                        case 3:
                            $query->andWhere('material_brevno = :brevno', [':brevno' => 1]);
                            $query->andWhere('material_brus = :brus', [':brus' => 1]);
                            break;
                    }
                }
                if ('area' == $key) {
                    switch ($value) {
                        case 1:
                            $query->andWhere('area < :area', [':area' => 100]);
                            break;
                        case 2:
                            $query->andWhere(['between', 'area', 100, 300]);
                            break;
                        case 3:
                            $query->andWhere('area > :area', [':area' => 300]);
                            break;
                    }
                }
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pagesize]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $projectform = new ProjectForm();
        return $this->render('index', [
            'projects' => $models,
            'pages' => $pages,
            'projectform' => $projectform
        ]);
    }


    /**
     * Displays a single Projects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_project]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_project]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
