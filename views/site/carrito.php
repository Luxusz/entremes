<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = "Carrito";


$session = Yii::$app->session;
if(!$session->isActive){
    $session->open();
}
$carrito = $session->get('carrito');
$mensaje = "Hola .... tus productos son: \n";

//Yii::$app->session->destroy();
?>
<div class="site-error" >

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <br>
    <?php
    if($carrito == null)
    {
    
        $carrito[]=array();
        echo 'No tienes nada en tu carrito';
    }
    else{
        ?>  
    <br>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-5">
            <h1> En tu carrito tienes: </h1>
            <br>
            <table class="table table-bordered" id="tbdecarrito" style="width: 200px">
                <thead>
                    <tr>
                        <th>Imagen</ht>
                        <th>Nombre</th>
                        <th>Precio</th>                
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <?php
                foreach($carrito as $producto_id){
                    $productoc= \app\models\Producto::findAll(['ID'=>$producto_id]);  

                ?>
                <tbody id="carritolleno" style=" background-color: white">
                    <?php

                    $vp = new \app\models\Producto();
                    foreach($productoc as $vp){
                        //$np = Products::findOne($vp->products_id);
                        $fila = "<tr>".
                                   "<td>".
                                        "<img style='height:50px;' src='".yii\helpers\Url::base() . "/images/productos/pro_" . $vp->ID . ".jpg'></td>".
                                   "<td>".$vp->Nombre."</td>".
                                    "<td>$".$vp->Valor."</td>".
                                    "<td>1</td>".
                                "</tr>";
                        $mensaje .= "Producto: ".$vp->Nombre." - Precio: $".$vp->Valor." \n";
                        echo $fila;
                    }
                }
            }
            ?>
                </tbody>
            </table>    
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-5">
                
                <h3>Ahora por favor ingresa los siguientes datos</h3>
                <br>

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

        </div>
    </div> 
    <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-5">                
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

            </div>
        </div>
    <?php
        $cotizacion='Cotización';
        $mensaje .= "Gracias por contactarte con nosotros";
        $form->field($model, 'subject')->hiddenInput(['value'=>$cotizacion])->label(false);
        $form->field($model, 'body')->hiddenInput(['value'=>$mensaje])->label(false)
    ?>
         <div class="row">
             <div class="col-lg-7"></div>
             <div class="col-lg-5">
                  <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
             </div>
             
        </div>
         <br>
        <?php ActiveForm::end(); ?>
</div>