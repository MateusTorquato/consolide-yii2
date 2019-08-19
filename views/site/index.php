<?php

use app\assets\MainAsset;
use yii\helpers\Html;

MainAsset::register($this);
?>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Projeto consolide
        </div>

        <div class="links">
            <?= Html::a('Cadastrar marcas', 'marcas') ?>
        </div>
    </div>
</div>
