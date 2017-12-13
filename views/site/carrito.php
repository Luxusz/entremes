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


//Yii::$app->session->destroy();
?>
<div class="site-error" >

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php
    if($carrito == null)
    {
    
        $carrito[]=array();
        echo 'No tienes nada en tu carrito';
    }
    else{
        ?>
    <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject')->hiddenInput(['value'=>'Cotización'])->label(false)?>

            </div>
        </div>
    <h1> En tu carrito tienes: </h1>
    <br>
    <table class="table table-bordered" id="tbdecarrito" >
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
            <tbody id="carritolleno">
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
                    echo $fila;
                }
            }
        }
        $tabla='carritolleno';
        ?>
            </tbody>
    </table>
    <div class="row">
            <div class="col-lg-5">                
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

            </div>
        </div>
    <div clasS="row"
    <?= $form->field($model, 'body')->hiddenInput(['value'=>$tabla])->label(false)?>;
    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div>