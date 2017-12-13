<?php
use yii\helpers\Html;
use yii\helpers\BaseUrl;
$this->title = 'Productos';
?>
<div class='contenedor' style="background-color: yellow !important">
    <div class="row" style="background-color: yellow !important">
        <div class="col-md-8">
            <img src="<?=yii\helpers\Url::base() . "/images/productos.png";?>"/>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div class="row" style="background-color: yellow !important">
        <div class="col-md-2">
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <?php 
            $categorias = \app\models\Tipo::find()->all(); 
            $cantidad = count(\app\models\Producto::find()->all());
            ?>
            <div class="row categoria"><a href="index.php?r=site/inventario">Todos (<?=$cantidad;?>)</a></div>
            <div class="row categoria">&nbsp;</div>
            <?php foreach($categorias as $categoria):
                $cantidad = count(\app\models\Producto::findAll(['Tipo_ID'=>$categoria]));
            ?>
            <div class="row categoria"><a href="index.php?r=site/inventario&cat=<?=$categoria->ID?>"><?=$categoria->Nombre;?> (<?=$cantidad;?>)</a></div>
            <?php endforeach;?>
        </div>
        <div class="col-md-10">
            <?php 
                
                $i=0;
                foreach($productos as $producto):
                    if($i%3==0) 
                        echo "<div class='row'>";
                    echo "<div class='col-md-4 producto'>";
                    ?>
                <a style="text-decoration:none" href="index.php?r=producto/detalle&id=<?=$producto->ID?>">
                    <div class='inner-producto' producto_id="<?=$producto->ID;?>">
                        <div class='row'>
                            <img style="border-radius: 15px;" src="<?php echo yii\helpers\Url::base()."/images/productos/pro_".$producto->ID.".jpg";?>" width="200" height="200"/>
                        </div>
                        <div class='row'>
                            <?php echo Html::encode($producto->Nombre);?>
                        </div>
                        <div class='row'>
                            <?php echo "$". Html::encode($producto->Valor);?>
                        </div>
                    </div>
                </a>
                    <?php
                    echo "</div>";
                    if(($i+1)%3==0) echo "</div>";
                    $i++;
                endforeach;
                ?>
        </div>
    </div>
    
</div>
<style>
    .producto{
        text-align: center;
        font:verdana 9pt;
    }
    .inner-producto:hover{
        cursor:pointer;
    }
    
    .inner-producto{
        
        border-radius: 15px;
        padding:10px;
        margin-top:10px;
    }
    a{
        color:#f39334;
    }
    a:hover{
        color:#f39334;
        text-decoration: none;
    }
</style>