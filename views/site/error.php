<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        El error ocurrio por que el servidor esta tardando mas de lo esperado en procesar su peticion.
    </p>
    <p>
       Por favor contactenos si cree que es un error del servidor. Gracias
    </p>

</div>