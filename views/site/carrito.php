<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$carrito =  Yii::$app->params['arr'];
$this->title = "Carrito";
?>
<div class="site-error" >

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h1>
            <?php foreach($carrito as $aux){
                $cantidad = count(\app\models\Producto::findAll(['Tipo_ID'=>$categoria]));
                    
            }
            ?>
      
    </h1>
   

</div>
