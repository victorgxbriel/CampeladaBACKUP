<?php

namespace app\controllers;

use Yii;
use app\models\Campeonato;
use app\models\CampeonatoSearch;
use app\models\EquipeSearch;
use app\models\Equipe;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CampeonatoController implements the CRUD actions for Campeonato model.
 */
class CampeonatoController extends Controller
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
            'access' => [
               'class' => AccessControl::className(),
               //'only' => ['login', 'logout', 'signup'],
               'rules' => [
                   [
                       'allow' => true,
                       'actions' => ['create', 'update', 'delete'],
                       'roles' => ['@'],
                   ],
                   [
                       'allow' => true,
                       'actions' => ['index', 'view'],
                       'roles' => ['@', '?'],
                   ],
               ],
           ],
        ];
    }

    /**
     * Lists all Campeonato models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampeonatoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campeonato model.
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
     * Creates a new Campeonato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campeonato();
        $equipes2 = Equipe::find()->all();
        $model->usuario_idusuario = \Yii::$app->user->identity->idusuario;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            for ($i=0 ; $i < $this->qtdEquipe  ; $i++ ) { 
                
            }
            return $this->redirect(['view', 'id' => $model->idcampeonato]);
        }

        $equipes = EquipeSearch::listAll();

        return $this->render('create', [
            'model' => $model,
            'equipes'=>$equipes,
            'equipes2'=>$equipes2,
            'formatos'=>Campeonato::$formatos   
        ]);
    }

    /**
     * Updates an existing Campeonato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcampeonato]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Campeonato model.
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
     * Finds the Campeonato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campeonato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campeonato::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
