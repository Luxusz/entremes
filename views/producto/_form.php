<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'Descripcion')->textarea(['rows' => 7]) ?>
     

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Valor')->textInput() ?>

    <?php
    echo $form->field($model, 'Tipo_ID')->dropDownList($tiposLst,['prompt'=>'SELECCIONE UN TIPO DE PRODUCTO']);
    ?>
    
    <?= $form->field($model, 'ProductoImg')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
