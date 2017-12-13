<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$this->title = "Carrito";
$are = Yii::$app->params['arra'];
$are[]=$ide;
?>
<div class="site-error" >

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h1>
            <?php print_r($are);
                    
            
            ?>
      
    </h1>
   

</div>
