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
        foreach($carrito as $producto_id){
            
            $productoc= \app\models\Producto::findAll(['Tipo_ID'=>$producto_id]);  
            var_dump($carrito);
        
    ?>
            <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>                
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="ingredientes">
                        <?php

                        $vp = new \app\models\Producto();
                        foreach($productoc as $vp){
                            //$np = Products::findOne($vp->products_id);
                            $fila = "<tr>".
                                       " <td>".$vp->Nombre."</td>".
                                        "<td>".$vp->Precio."</td>".
                                        "<td>".$np->Cantidad."</td>".
                                        "<td>".
                                    "</tr>";
                            echo $fila;
                        }
                    }
                }

            ?>
        </tbody>
    </table>
</div>