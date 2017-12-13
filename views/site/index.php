<?php
/* @var $this yii\web\View */

$this->title = 'La Carreta';
?>
<br/>
<body style="background-color: yellow"> 
<center>
    <div id="myCarousel" class="carousel slide" style="width:1000px;" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $destacados = \app\models\Producto::findAll(['Tipo_ID' => 1]);
            $i = 0;
            foreach ($destacados as $destacado):
                ?>
                <li data-target="#myCarousel" data-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active"' : ''; ?>></li>
                <?php
                $i++;
            endforeach;
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($destacados as $destacado):
                ?>
                <div class="item <?= ($i == 0) ? 'active' : ''; ?>">
                    <a href="index.php?r=producto/detalle&id=<?= $destacado->ID ?>">
                        <img style="height:120px;" src="<?php echo yii\helpers\Url::base() . "/images/productos/pro_" . $destacado->ID . ".jpg"; ?>" alt="<?= $destacado->Nombre; ?>">
                        <div class="carousel-caption">
                            <h3><?= $destacado->Nombre; ?></h3>
                            <p><?= $destacado->Descripcion; ?></p>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            endforeach;
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br/>
    <div class='footer' style=" background-color: #f39334; border-radius: 10px;
        padding:15px; color:white;">
        Para más información contáctese al +56 9 79830201 o al +56 9 92400339
    </div>
</center>
</body>
<style>
    .carousel-control{
        color:orange !important;
    }
</style>