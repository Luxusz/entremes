<body style="background-color: yellow">
<div class="row" style="background-color: yellow">
    <img src="<?=yii\helpers\Url::base();?>/images/iconos/contacto2.png" width="1200" height="200">
</div>
<br>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';

?>
<div class="container" style="background-color: yellow">
<div class="site-contact" style="color: black">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Muchas Gracias por Contactarnos, Le responderemos sus dudas e inquetiudes en un momento.
        </div>

    <?php else: ?>

        <p>
            Para cualquier comentario o consulta, por favor rellene el formulario, o si lo prefieres llámanos al <b>+56 9 79830201</b> o al <b>+56 9 92400339</b>, y a la brevedad nos contactaremos contigo.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

         <?php endif; ?>
    </div>
</div>
</body>
<style>
</style>