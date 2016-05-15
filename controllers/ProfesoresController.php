<?php

namespace app\controllers;

use Yii;
use app\models\Materia;
use app\models\MateriaSearch;
use app\models\Profesor;
use app\models\ProfesorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProfesoresController extends Controller
{
    
    public function behaviors() {
        return[
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $searchModel = new ProfesorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id) {

        $model = $this->findModel($id);
        
        $materia = new Materia();
        $materia->idProfesor = $id;
        
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->searchByProfesorID($id, Yii::$app->request->queryParams);
        
        return $this->render('view', [
            'model' =>$model,
            'materia' =>$materia,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);

    }
    
    public function actionCreate() {
        
        $model = new Profesor();
        
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', ['model' => $model,]);
        
    }
    
    public function actionUpdate($id) {
        
        $model = $this->findModel($id);
        
        if($model->load(Yii::$app->request->post())&& $model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
    }
    
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    protected function findModel($id) {
        
        if(($model = Profesor::findOne($id)) != null){
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe');
        }
        
    }

}
