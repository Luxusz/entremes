<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Producto;

class SiteController extends Controller
{
    public function actionInventario ()
    {
        $categoria = "";
        if(isset($_GET['cat'])){
            $categoria = $_GET['cat'];
        }
        $productos = \app\models\Producto::find()->all();
        if((int)$categoria>0){
            $productos = \app\models\Producto::findAll(['Tipo_ID'=>$categoria]);
        }
        return $this->render('inventario',array('productos'=>$productos));
    }
   public function actionDetalle()
    {
        return $this->render('detalle');
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionLocacion()
    {
        return $this->render('locacion');
    }
    
    public function actionCarrito($ide = null)
    {
        
        if($ide != null){
            $session = Yii::$app->session;
            if(!$session->isActive){
                $session->open();
            }
            $carrito = $session->get('carrito');
            if($carrito == null){
                $carrito = array();
            }
            if(!in_array($ide, $carrito)){
                $carrito[] = $ide;
            }

            $session->set('carrito',$carrito);

        }
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            
            $session = Yii::$app->session;
            if(!$session->isActive){
                $session->open();
            }
            /*$carrito = $session->get('carrito');
            
            $mensaje = "Hola .... tus productos son: \n";
            foreach($carrito as $producto_id){
                $producto = Producto::findOne($producto_id);
                $mensaje .= "Producto: ".$producto->Nombre." - Precio: $".$producto->Valor." \n";
            }
            
            $mensaje .= "Gracias por contactarte con nosotros";
            $cotizacion='Cotización';
            $model->contact(Yii::$app->params['adminEmail']);*/
            $model->contact(Yii::$app->params['adminEmail']);            
            Yii::$app->session->destroy();
            return $this->goHome();
            
        }
        return $this->render('carrito', [
            'model' => $model,
        ]);
        
        /*
        $miarreglo=array();
        $miarreglo[]=$ide;
        Yii::$app()->params['arr']=$miarreglo;
         */  
        
        //return $this->render('carrito');
        
        
    }
    
}
