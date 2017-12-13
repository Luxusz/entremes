<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
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
    <h1> En tu carrito tienes: </h1>
    <br>
    <table class="table table-bordered" >
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

        ?>
            </tbody>
    </table>
</div>