<?php

namespace kupi_othodov_ru\module_catalog\modules\admin\controllers;

use Yii;
use kupi_othodov_ru\module_catalog\models\Manufacture;
use kupi_othodov_ru\module_catalog\models\ManufactureSearch;
use amd_php_dev\yii2_components\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManufactureController implements the CRUD actions for Manufacture model.
 */
class ManufactureController extends AdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ]
            ]
        );
    }

    /**
     * Lists all Manufacture models.
     * @return mixed
     */
    public function actionIndex()
    {
    
        $this->view->title = 'Производство';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        $searchModel = new ManufactureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manufacture model.
     * @param integer $id
     * @return mixed
     */
    //public function actionView($id)
    //{
    //    $this->view->title = $model->name;
    //    $this->view->params['breadcrumbs'][] = ['label' => 'Manufactures', 'url' => ['index']];
    //    $this->params['breadcrumbs'][] = $this->view->title;
    //
    //    return $this->render('view', [
    //        'model' => $this->findModel($id),
    //    ]);
    //}

    /**
     * Creates a new Manufacture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manufacture();

        if ($this->createModel($model)) {
            return $this->redirect(['index']);
        } else {

            $this->view->title = 'Добавить';
            $this->view->params['breadcrumbs'][] = ['label' => 'Производство', 'url' => ['index']];
            $this->view->params['breadcrumbs'][] = $this->view->title;

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Manufacture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (\Yii::$app->request->isAjax) {
            $this->updateModelAjax($model);
        } else {
            if ($this->updateModel($model)) {
                return $this->redirect(['index']);
            } else {

                $this->view->title = 'Редактировать: ' . $model->name;
                $this->view->params['breadcrumbs'][] = ['label' => 'Производство', 'url' => ['index']];
                //$this->view->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
                $this->view->params['breadcrumbs'][] = $this->view->title;

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing Manufacture model.
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
     * Finds the Manufacture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Manufacture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manufacture::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
