<?php
$this->title = 'Entremés';
?>
<body>
    <div class='contenedor'>
<div class="row">
    <div class="col-md-12">
         <img src='../web/images/iconos/productodetalle.png' width="1135px" height="200px">
    </div>
</div>
<br>
<br>

<div class="row">
    <div class="col-md-5">
        <img style=" border-radius: 15px; border: 5px solid darkred" width='475px' height="300px" src="<?=yii\helpers\Url::base()."/images/productos/pro_".$producto->ID.".jpg";?>"/>
    </div>
    <div class="col-md-6">
        <div class="inner-producto">
            <p style="font-size: 15pt; color:darkred; align-content: center;"><?=$producto->Nombre;?></p> 
            <br>
            <p style="font-size: 11pt; color:darkred; align-content: center;"><?=$producto->Descripcion;?></p>
        </div> 
        <div>
            <p style="font-size: 13pt; color:darkred;"><?="$".$producto->Valor;?></p> 
        </div> 
    </div>
</div>
</div>
</body>
<style>
   .inner-producto{
        color:#f39334;
        padding:1px;
   }
 
</style>
    
  