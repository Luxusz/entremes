<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            //'Nombre',
            'Descripcion',
            'Cantidad',
            'Valor',
           
           ['attribute'=>'Tipo_ID','value'=>$model->tipo->Nombre],
        ],
    ]) ?>
<p>
        <?= Html::a('Editar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este producto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
