<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\Tipo;
use yii\helpers\ArrayHelper;
use app\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],/*
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update','delete','view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update','delete','view'],
                        'roles' => ['@'],
                    ],
                ],
            ],*/
                    
        ];
    }
    
    public function actionDestacar($id){
        $producto = $this->findModel($id);
        $producto->destacado = !$producto->destacado;
        $producto->save();
        return $this->redirect(['index']);
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Producto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    public function actionDetalle($id)
    {
        return $this->render('detalle', [
            'producto' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $tipos = Tipo::find()->all();
        $tiposLst = ArrayHelper::map($tipos, 'ID', 'Nombre');
        $model = new Producto();
        
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                $productoId=$model->ID;
                $imagen=UploadedFile::getInstance($model,'ProductoImg');
                $imageNombre = "pro_".$productoId.".jpg";
                $folder = Yii::getAlias('@webroot/images/productos');
                if(!is_dir($folder)){
                    mkdir($folder);
                }
                if($imagen != null){
                    $imagen->saveAs($folder.'/'.$imageNombre);
                }
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'tiposLst' => $tiposLst,
            ]);
        }
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tipos = Tipo::find()->all();
        $tiposLst = ArrayHelper::map($tipos, 'ID', 'Nombre');
        if ($model->load(Yii::$app->request->post())  ) {
            
            $productoId=$model->ID;
            $imagen=UploadedFile::getInstance($model,'ProductoImg');
            $imageNombre = "pro_".$productoId.".jpg";
            if($model->save()){
                $folder = Yii::getAlias('@webroot/images/productos');
                if(!is_dir($folder)){
                    mkdir($folder);
                }
                if($imagen != null){
                    $imagen->saveAs($folder.'/'.$imageNombre);
                }
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,'tiposLst'=>$tiposLst,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
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
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La pagina que solicito no existe o Error en la digitacion de la URL.');
        }
    }
    
    public function actionCarrito()
    {
        return $this->render('carrito');
    }
}
