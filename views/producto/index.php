<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<body style="background-color: yellow">
    <div class="producto-index" >

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'ID',
                'Nombre',
                'Descripcion',
                'Cantidad',
                'Valor',
                // 'ProductoImg',
                // 'Tipo_ID',

                ['class' => 'yii\grid\ActionColumn'],
                ['class' => 'yii\grid\ActionColumn',
                 'template' => '{my_button}', 
                 'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        $star = 'glyphicon glyphicon-star';
                        if($model->destacado == 0){
                            $star = 'glyphicon glyphicon-star-empty';
                        }
                        return Html::a('<span class="'.$star.'" aria-hidden="true"></span>', ['destacar', 'id'=>$model->ID  ]);
                    },]
                ],
            ],
        ]); ?>
        <p>
            <?= Html::a('Ingresar Producto', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
</body>
